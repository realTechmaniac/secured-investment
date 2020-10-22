<?php

namespace App\Http\Controllers;

use App\GetHelp;
use App\ProvideHelp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GetHelpController extends Controller
{
    public function gotoGetHelp()
    {
        $user = auth()->user();
        /*Provide help available for GH*/
        $ph_available_for_gh = ProvideHelp::where('user_id', $user->id)
            ->where('is_activation_fee', false)->where('is_withdrawn', false)
            ->where('status', 'completed')->where('available_for_gh_at', '<', now())->get();

        $ph_recommit = $ph_available_for_gh->sortByDesc('id')->take(1)->first();
        $ph_available = $ph_available_for_gh->sortByDesc('id')->skip(1);


        /*Pending Provide Help */
        $ph_pending_first_investment = ProvideHelp::where('user_id', $user->id)
            ->where('is_activation_fee', false)->where('is_withdrawn', false)->where('is_first', true)
            ->where('status', 'completed')->where('available_for_gh_at', '>=', now())->first();

        $ph_pending_first_investment_pending = ProvideHelp::where('user_id', $user->id)
            ->where('is_activation_fee', false)->where('is_withdrawn', false)->where('is_first', true)
            ->where('status', 'pending')->where('available_for_gh_at', '>=', now())->first();

        $ph_pending_first_investment_completed = ProvideHelp::where('user_id', $user->id)
            ->where('is_activation_fee', false)->where('is_withdrawn', false)->where('is_first', true)
            ->where('status', 'pending')->where('available_for_gh_at', '<', now())->first();


        $ph_pending = ProvideHelp::where('user_id', $user->id)
            ->where('is_activation_fee', false)->where('is_withdrawn', false)
            ->where('status', 'completed')->where('available_for_gh_at', '>=', now())
            ->where('is_first', false)->get();

        $ph_pending_status_not_completed = ProvideHelp::where('user_id', $user->id)
            ->where('is_activation_fee', false)->where('is_withdrawn', false)
            ->where('status', 'pending')->where('available_for_gh_at', '>=', now())
            ->where('is_first', false)->get();


        //dd($ph_pending);
        $ph_pending_completed = ProvideHelp::where('user_id', $user->id)
            ->where('is_activation_fee', false)->where('is_withdrawn', false)
            ->where('status', 'pending')->where('available_for_gh_at', '<', now())
            ->where('is_first', false)->get();


        $referral_bonus = 0;
        if ($user->is_guider){
            if ($user->referrerDetail->referrer_balance >= 10000){
                $referral_bonus = $user->referrerDetail->referrer_balance;
            }
        }else{
            if ($user->referrerDetail->referrer_balance >= 5000){
                $referral_bonus = $user->referrerDetail->referrer_balance;
            }
        }

        $ref = $user->referrerDetail->referrer_balance;

        return view('user.get-help', compact(
            'ph_recommit', 'ph_available', 'ph_pending_first_investment', 'referral_bonus', 'ref',
            'ph_pending', 'ph_available_for_gh', 'ph_pending_completed', 'ph_pending_status_not_completed',
            'ph_pending_first_investment_pending', 'ph_pending_first_investment_completed'
        ));
    }

    public function saveGetHelp(Request $request)
    {
        $user = Auth::user();
        $referral_amount = $request->referral_amount;
        $profit_amount = $request->profit_amount;
        $withdrawal = $request->withdrawal_amount + $referral_amount;
        $profit = $profit_amount + $referral_amount;
        $ph_id = $request->ph_id;

        $gh_check = GetHelp::where('user_id', $user->id)->where('status', 'pending')->first();
        $ph_check = ProvideHelp::where('user_id', $user->id)->where('status', 'pending')->first();
        if ($gh_check || $ph_check){
            return redirect()->back()->with('danger', 'You have a pending request');
        }

        $user->referrerDetail->update([
            'referrer_balance' => $user->referrerDetail->referrer_balance - $referral_amount
        ]);
        ProvideHelp::where('id', $ph_id)->update(['is_withdrawn' => true]);
        $exp = Carbon::parse($user->sub_expires_at)->toDateTimeString();
        GetHelp::firstOrCreate(
            [
                'user_id' => $user->id,
                'status' => 'pending',
            ],
            [
                'amount' => $withdrawal,
                'to_balance' => $withdrawal,
                'provide_help_id' => $ph_id,
                'added_referral_bonus' => $referral_amount,
                'profit' => $profit,
                'sub_expires_at' => $exp,
                'token' => Str::random(40),
            ]
        );

        return redirect(route('dashboard'))->with('success', 'Request sent successfully');
    }

    public function saveCeoGetHelp(Request $request)
    {
        $user = Auth::user();
        $withdrawal = $request->gh_ceo;
        $gh_check = GetHelp::where('user_id', $user->id)->where('status', 'pending')->first();
        $ph_check = ProvideHelp::where('user_id', $user->id)->where('status', 'pending')->first();
        if ($gh_check || $ph_check){
            return redirect()->back()->with('danger', 'You have a pending request');
        }
        if ($withdrawal < 5000 || $withdrawal > 100000){
            return redirect()->back()->with('danger', 'Amount can not be lesser than NGN 5,000 or greater than NGN 100,000');
        }
        $exp = Carbon::parse($user->sub_expires_at)->toDateTimeString();
        GetHelp::firstOrCreate(
            [
                'user_id' => $user->id,
                'status' => 'pending',
            ],
            [
                'amount' => $withdrawal,
                'to_balance' => $withdrawal,
                'profit' => 0,
                'sub_expires_at' => $exp,
                'token' => Str::random(40),
            ]
        );

        return redirect(route('dashboard'))->with('success', 'Request sent successfully');
    }
}
