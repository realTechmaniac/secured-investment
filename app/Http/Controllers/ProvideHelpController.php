<?php

namespace App\Http\Controllers;

use App\GetHelp;
use App\ProvideHelp;
use App\ReferralHistory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Telegram\Bot\Laravel\Facades\Telegram;

class ProvideHelpController extends Controller
{
    public function gotoProvideHelp()
    {
        return view('user.provide-help');
    }

    public function saveProvideHelp(Request $request)
    {
        $user = auth()->user();
        $ph_amount = (int)$request->ph_amount;
        //dd($ph_amount);
        if (!$user->is_activated){
            return redirect()->back()->with('danger', 'Your account is not activated');
        }
        if ($user->is_blocked){
            return redirect()->back()->with('danger', 'Your account has sanctioned. Pay sanction fine');
        }
        if ($ph_amount < 2000 || $ph_amount > 100000){
            return redirect()->back()->with('danger', 'Amount can not be lesser than NGN 2,000 or greater than NGN 100,000');
        }
        if ($user->provideHelps->count() > 0){
            $ph_invalid = ProvideHelp::where('user_id', $user->id)->where('amount', '>', $ph_amount)->first();
            //dd($ph_invalid);
            if ($ph_invalid){
                return redirect()->back()->with('danger', 'Amount must be greater than or equals to the highest amount of your previous investments');
            }
            $ph_pending = ProvideHelp::where('user_id', $user->id)->where('status', 'pending')->first();
            if ($ph_pending){
                return redirect()->back()->with('danger', 'You have a pending request');
            }
        }
        if ($user->getHelps->count() > 0){
            $gh_pending = GetHelp::where('user_id', $user->id)->where('status', 'pending')->first();
            if ($gh_pending){
                return redirect()->back()->with('danger', 'You have a pending request');
            }
        }

        if ($user->role == 'regular'){
            if ($user->provideHelps->count() == 1){
                /*First Investment after activation fee*/
                ProvideHelp::create([
                    'user_id' => $user->id,
                    'amount' => $ph_amount,
                    'to_balance' => $ph_amount,
                    'is_first' => true,
                    'available_for_gh_at' => now()->addHours(24),
                    /*'available_for_gh_at' => now()->addSeconds(30),*/
                    'token' => Str::random(40),
                ]);
                $user->update([
                    'activation' => 'subsequent'
                ]);
            }
            elseif ($user->provideHelps->count() > 1){
                ProvideHelp::create([
                    'user_id' => $user->id,
                    'amount' => $ph_amount,
                    'to_balance' => $ph_amount,
                    'available_for_gh_at' => now()->addDays(4),
                   /* 'available_for_gh_at' => now()->addSeconds(60),*/
                    'token' => Str::random(40),
                ]);
            }
            else{
                return redirect(route('dashboard'))->with('danger', 'Request not processed. Something went wrong');
            }
        }
        else{
            if ($user->provideHelps->count() == 0){
                /*First Investment for admins (because they will not pay activation fee)*/
                ProvideHelp::create([
                    'user_id' => $user->id,
                    'amount' => $ph_amount,
                    'to_balance' => $ph_amount,
                    'is_first' => true,
                    'available_for_gh_at' => now()->addHours(24),
                    /*'available_for_gh_at' => now()->addSeconds(30),*/
                    'token' => Str::random(40),
                ]);
                $user->update([
                    'activation' => 'subsequent'
                ]);
            }
            elseif ($user->provideHelps->count() > 0){
                ProvideHelp::create([
                    'user_id' => $user->id,
                    'amount' => $ph_amount,
                    'to_balance' => $ph_amount,
                    'available_for_gh_at' => now()->addDays(2),
                    /*'available_for_gh_at' => now()->addSeconds(45),*/
                    'token' => Str::random(40),
                ]);
            }
            else{
                return redirect(route('dashboard'))->with('danger', 'Request not processed. Something went wrong');
            }
        }

        /*$text = "Hello <b>".Auth::user()->username."</b>, your request to donate ".$ph_amount." is successful, Kindly wait to be merged.";

        Telegram::sendMessage([
            'chat_id' => -1001308789917,
            'parse_mode' => 'HTML',
            'text' => $text
        ]);*/

        return redirect(route('dashboard'))->with('success', 'Request sent successfully');
    }
}
