<?php

namespace App\Http\Controllers;

use App\GetHelp;
use App\ProvideHelp;
use App\ReceiptUpload;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function userDashboard()
    {
        $user_id = Auth::id();

        /*User Activation*/
        $ph_activation = ProvideHelp::where('user_id', $user_id)
            ->where('status', 'pending')
            ->where('is_activation_fee', true)
            ->first();

        /*User Reactivation Fee*/
        $sub_expires_at = Auth::user()->sub_expires_at;
        $user_gh_for_the_month = GetHelp::where('user_id', $user_id)
            ->where('status', 'completed')
            ->where('sub_expires_at', $sub_expires_at)
            ->get();
        $user_profit_for_the_month = 0;
        if ($user_gh_for_the_month->count() > 0){
            foreach ($user_gh_for_the_month as $row){
                $user_profit_for_the_month += $row->profit;
            }
        }
        $user_reactivation_fee = $user_profit_for_the_month * 0.05;

        /*Get Help Completed*/
        $gh_completed = GetHelp::where('user_id', $user_id)
            ->where('status', 'completed')
            ->get();
        $ph_completed = ProvideHelp::where('user_id', $user_id)
            ->where('status', 'completed')
            ->get();

        $ph_pending = ProvideHelp::where('user_id', $user_id)
            ->where('status', 'pending')
            ->where('is_activation_fee', false)
            ->first();
        $gh_pending = GetHelp::where('user_id', $user_id)
            ->where('status', 'pending')
            ->first();

        /*Activation And reactivation*/
        $ph_activation_amount_left_to_balance = 0;
        $ph_activation_amount = 0;
        $ph_activation_amount_on_processing = 0;
        $ph_activation_amount_paid = 0;
        $ph_activation_earliest_merge_expiration = "N/A";
        if ($ph_activation){
            $ph_activation_amount_left_to_balance = $ph_activation->to_balance;
            $ph_activation_amount = $ph_activation->amount;
            if($ph_activation->getHelps->count() > 0){
                $get_first_unconfirmed_merge = $ph_activation->unConfirmedGh->first();
                $ph_activation_earliest_merge_expiration = Carbon::parse($get_first_unconfirmed_merge->merge->expires_at)
                    ->format('g:i A \o\n l\, jS F Y');
                foreach ($ph_activation->getHelps as $ph_gh){
                    if (!$ph_gh->is_confirmed){
                        $ph_activation_amount_on_processing += $ph_gh->merge->merge_amount;
                    }
                    else{
                        $ph_activation_amount_paid += $ph_gh->merge->merge_amount;
                    }
                }
            }
        }

        /*Pending Provide Help*/
        $ph_pending_amount_left_to_balance = 0;
        $ph_pending_amount = 0;
        $ph_pending_amount_on_processing = 0;
        $ph_pending_amount_paid = 0;
        $ph_earliest_merge_expiration = "N/A";
        if ($ph_pending){
            $ph_pending_amount_left_to_balance = $ph_pending->to_balance;
            $ph_pending_amount = $ph_pending->amount;
            if ($ph_pending->getHelps->count() > 0){
                $get_first_unconfirmed_merge = $ph_pending->unConfirmedGh->first();
                $ph_earliest_merge_expiration = Carbon::parse($get_first_unconfirmed_merge->merge->expires_at)
                    ->format('g:i A \o\n l\, jS F Y');
                foreach ($ph_pending->getHelps as $ph_gh){
                    if (!$ph_gh->is_confirmed){
                        $ph_pending_amount_on_processing += $ph_gh->merge->merge_amount;
                    }
                    else{
                        $ph_pending_amount_paid += $ph_gh->merge->merge_amount;
                    }
                }
            }
        }

        /*Pending Get Help*/
        $gh_pending_amount_left_to_balance = 0;
        $gh_pending_amount = 0;
        $gh_pending_amount_on_processing = 0;
        $gh_pending_amount_paid = 0;
        $gh_earliest_merge_expiration = "N/A";
        if ($gh_pending){
            $gh_pending_amount_left_to_balance = $gh_pending->to_balance;
            $gh_pending_amount = $gh_pending->amount;
            if ($gh_pending->provideHelps->count() > 0){
                $get_first_unconfirmed_merge = $gh_pending->unConfirmedPh->first();
                $gh_earliest_merge_expiration = Carbon::parse($get_first_unconfirmed_merge->merge->expires_at)
                    ->format('g:i A \o\n l\, jS F Y');
                foreach ($gh_pending->provideHelps as $gh_ph){
                    if (!$gh_ph->is_confirmed){
                        $gh_pending_amount_on_processing += $gh_ph->merge->merge_amount;
                    }
                    else{
                        $gh_pending_amount_paid += $gh_ph->merge->merge_amount;
                    }
                }
            }
        }


        return view('user.dashboard', compact(
            'ph_pending', 'gh_pending', 'ph_activation',
            'ph_activation_amount_left_to_balance','ph_activation_amount',
            'ph_activation_amount_on_processing','ph_activation_amount_paid', 'ph_activation_earliest_merge_expiration',
            'ph_pending_amount_left_to_balance', 'ph_pending_amount',
            'ph_pending_amount_on_processing', 'ph_pending_amount_paid', 'ph_earliest_merge_expiration',
            'gh_pending_amount_left_to_balance', 'gh_pending_amount',
            'gh_pending_amount_on_processing', 'gh_pending_amount_paid', 'gh_earliest_merge_expiration',
            'user_reactivation_fee', 'user_profit_for_the_month'
        ));
    }

    public function payActivationFee()
    {
        ProvideHelp::create([
            'user_id' => Auth::id(),
            'amount' => 1000,
            'to_balance' => 1000,
            'is_activation_fee' => true,
            'token' => Str::random(40),
        ]);

        session()->flash('success', 'Request sent successfully');

        return redirect(route('dashboard'));
    }

    public function cancelActivationFee($token)
    {
        $get_ph = ProvideHelp::where('token', $token)->first();
        $get_ph->delete();
        session()->flash('success', 'Request cancelled successfully');
        return redirect(route('dashboard'));
    }

    public function uploadPaymentReceipt(Request $request, $ph_id, $gh_id)
    {
        if (!$ph_id || !$gh_id){
            session()->flash('danger', 'Something went wrong');
        }
        if (!$request->hasFile('receipt')) {
            return redirect()->back()->with('danger', "\"Select Receipt\" image before clicking \"Upload\"");
        }
        $this->validate($request, [
            'receipt' => 'bail|required|image|max:1024',
        ]);
        $image = $request->file('receipt');
        $receipt = ReceiptUpload::uploadReceiptToStorage($image);
        ReceiptUpload::create([
            'image' => $receipt,
            'provide_help_id' => $ph_id,
            'get_help_id' => $gh_id,
            'token' => Str::random(39),
        ]);
        session()->flash('success', 'Receipt upload successfully');
        return redirect(route('dashboard'));
    }

    public function payReactivationFee(Request $request)
    {
        if($request->has('reactivation_fee') && !empty($request->input('reactivation_fee'))) {

            $fee = $request->reactivation_fee;
            if ($fee == 0){
                Auth::user()->update([
                    'is_activated' => true,
                    'activation' => 'subsequent',
                    'sub_expires_at' => now()->addDays(30),
                ]);
                session()->flash('success', 'Account activated successfully');
            }
            elseif ($fee > 0){
                ProvideHelp::create([
                    'user_id' => Auth::id(),
                    'amount' => $fee,
                    'to_balance' => $fee,
                    'is_activation_fee' => true,
                    'token' => Str::random(40),
                ]);
                /*This must have already been set but in case...*/
                Auth::user()->update([
                    'is_activated' => false,
                    'activation' => 'subsequent',
                ]);

                session()->flash('success', 'Request sent successfully');
            }
            else{
                session()->flash('danger', 'Invalid data was sent');
            }

            return redirect(route('dashboard'));

        } else {

            session()->flash('danger', 'Something went wrong');

            return redirect(route('dashboard'));

        }
    }

    public function paySanctionFine()
    {
        ProvideHelp::create([
            'user_id' => Auth::id(),
            'amount' => 3000,
            'to_balance' => 3000,
            'is_activation_fee' => true,
            'token' => Str::random(40),
        ]);

        /*This must have already been set but in case...*/
        Auth::user()->update([
            'is_blocked' => true,
        ]);

        session()->flash('success', 'Request sent successfully');

        return redirect(route('dashboard'));
    }

    public function cancelProvideHelp($token)
    {
        $get_ph = ProvideHelp::where('token', $token)->first();
        $get_ph->delete();
        session()->flash('success', 'Request cancelled successfully');
        return redirect(route('dashboard'));
    }

    public function cancelGetHelp($token)
    {
        $get_ph = GetHelp::where('token', $token)->first();
        $get_ph->delete();
        session()->flash('success', 'Request cancelled successfully');
        return redirect(route('dashboard'));
    }

    public function flagReceipt($receipt_token)
    {
        $get_receipt = ReceiptUpload::where('token', $receipt_token)->first();
        $ph_id = $get_receipt->provide_help_id;
        $gh_id = $get_receipt->get_help_id;
        $ph = ProvideHelp::where('id', $ph_id)->first();
        $ph->getHelps()->updateExistingPivot($gh_id, [
            'expires_at' => now()->addDays(14),
        ]);
        if ($get_receipt){
            $get_receipt->update(['is_fake' => true]);
            return redirect(route('dashboard'))->with('success', 'Receipt has been flagged as fake');
        }
        else{
            return redirect(route('dashboard'))->with('danger', 'Something went wrong');
        }
    }

    public function paymentConfirmation($ph_token)
    {
        $ph = ProvideHelp::where('token', $ph_token)->first();
        if ($ph->user->role == 'ceo'){

        }
        elseif ($ph->user->role == 'manager'){

        }
        elseif ($ph->user->role == 'admin'){

        }
        elseif ($ph->user->role == 'regular'){

        }


    }
}
