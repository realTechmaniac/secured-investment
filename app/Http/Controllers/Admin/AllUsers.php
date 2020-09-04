<?php

namespace App\Http\Controllers\Admin;

use App\BankDetail;
use App\Http\Controllers\Controller;
use App\ProvideHelp;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AllUsers extends Controller
{
    public function showUsers()
    {
        $users = User::all()->skip(1);
        $ceo = User::where('id', 1)->where('role', 'ceo')->first();
        return view('admin.all-users', compact('users', 'ceo'));
    }

    public function editUserDetails($user_token)
    {
        $user = User::where('token', $user_token)->first();
        return view('admin.edit-user-details', compact('user'));
    }

    public function saveUserDetails(Request $request, $user_token)
    {
        $user = User::where('token', $user_token)->first();
        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:70'],
            'last_name' => ['required', 'string', 'max:70'],
            'phone_number' =>
                [
                    'required', 'digits:11',
                    Rule::unique('users')->ignore($user->id)
                ],
            'username' =>
                [
                    'required', 'string', 'max:70',
                    Rule::unique('users')->ignore($user->id)
                ],
            'gender' => ['required', 'string', 'max:20'],
            'email' =>
                [
                    'required', 'string', 'email', 'max:100',
                    Rule::unique('users')->ignore($user->id)
                ],
        ]);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' =>  $request->last_name,
            'phone_number' => $request->phone_number,
            'username' => $request->username,
            'gender' =>  $request->gender,
            'email' => $request->email,
        ]);


        if ($request->role && Auth::user()->role == 'ceo') {
            if ($request->role == 'regular') {
                $total_referrals = $user->referrerDetail->referralHistories->count();
                $total_ph  = 0;
                $get_ph_amounts = ProvideHelp::where('user_id', $user->id)
                    ->where('status', 'completed')->where('is_activation_fee', false)->get();
                if ($get_ph_amounts->count() > 0){
                    foreach ($get_ph_amounts as $row){
                        $total_ph += $row->amount;
                    }
                }
                if ($total_referrals < 25 || $total_ph < 50000){
                    if ($user->is_guider){
                        $user->update([
                            'is_guider' => false
                        ]);
                    }
                }

                $user->update([
                    'role' => $request->role,
                ]);
            }
            else {
                $user->update([
                    'role' => $request->role,
                    'is_guider' => true,
                    'is_activated' => true,
                    'activation' => 'subsequent',
                    'sub_expires_at' => now()->addDays(30),
                ]);
            }
        }
        return redirect()->back()->with('success', 'User\'s personal details updated successfully');
    }

    public function saveBankDetails(Request $request, $bank_token)
    {
        $get_bank = BankDetail::where('token', $bank_token)->first();
        $this->validate($request, [
            'full_name' => ['bail', 'required', 'string', 'max:100'],
            'bank_name' => ['bail', 'required', 'string', 'max:100'],
            'account_number' =>
                [
                    'bail', 'required', 'digits:10', Rule::unique('bank_details')->ignore($get_bank->id),
                ],
        ]);
        $get_bank->update([
            'full_name' => $request->full_name,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
        ]);
        return redirect()->back()->with('success', 'User\'s bank details updated successfully');
    }

    public function generatePasswordResetLink($user_token)
    {
        $get_user = User::where('token', $user_token)->first();
        $get_user->update([
            'misc_token' => Str::random(40)
        ]);
        return redirect()->back()->with('success', 'Reset password link generated successfully');
    }

    public function passwordResetPage($misc_token)
    {
        $get_user = User::where('misc_token', $misc_token)->first();
        if (!$get_user){
            return redirect(route('welcome'))->with('danger', 'Invalid Link');
        }

        return view('user.reset-password', compact('misc_token'));
    }

    public function savePasswordReset(Request $request, $misc_token)
    {
        $this->validate($request, [
            'password' => ['bail', 'required', 'confirmed', 'min:8'],
        ]);

        $get_user = User::where('misc_token', $misc_token)->first();
        if (!$get_user){
            return redirect(route('welcome'))->with('danger', 'Something went wrong');
        }
        $get_user->update([
           'password' => Hash::make($request->password),
           'misc_token' => null,
        ]);
        return redirect(route('login'))->with('Password changed successfully');
    }
}
