<?php

namespace App\Http\Controllers;

use App\BankDetail;
use App\GetHelp;
use App\ProvideHelp;
use App\ReceiptUpload;
use App\ReferralHistory;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Telegram\Bot\Laravel\Facades\Telegram;

class UserController extends Controller
{
    use AppMainTrait;
    public function userDashboard()
    {
        /*$activity = Telegram::getUpdates();
        dd($activity);*/
        //Telegram Bot notification
        /*$text = "Message From The Developer\n"
            . "<b>Ignore Please: </b>\n"
            . "<b>Message: </b>\n"
            . "Telegram Bot test successful";

        Telegram::sendMessage([
            'chat_id' => -1001308789917,
            'parse_mode' => 'HTML',
            'text' => $text
        ]);*/

        $this->checkUserStatus();

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
            if($ph_activation->unConfirmedGh->count() > 0){
                $get_first_unconfirmed_merge = $ph_activation->unConfirmedGh->first();
                $ph_activation_earliest_merge_expiration = Carbon::parse($get_first_unconfirmed_merge->merge->expires_at)
                    ->format('g:i A \o\n l\, jS F Y');
            }
            if($ph_activation->unConfirmedGh->count() > 0){
                foreach ($ph_activation->getHelps as $ph_gh){
                    if (!$ph_gh->merge->is_confirmed){
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
            if ($ph_pending->unConfirmedGh->count() > 0){
                $get_first_unconfirmed_merge = $ph_pending->unConfirmedGh->first();
                $ph_earliest_merge_expiration = Carbon::parse($get_first_unconfirmed_merge->merge->expires_at)
                    ->format('g:i A \o\n l\, jS F Y');
            }
            if ($ph_pending->getHelps->count() > 0){
                foreach ($ph_pending->getHelps as $ph_gh){
                    if (!$ph_gh->merge->is_confirmed){
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
            if ($gh_pending->unConfirmedPh->count() > 0){
                $get_first_unconfirmed_merge = $gh_pending->unConfirmedPh->first();
                $gh_earliest_merge_expiration = Carbon::parse($get_first_unconfirmed_merge->merge->expires_at)
                    ->format('g:i A \o\n l\, jS F Y');
            }
            if ($gh_pending->provideHelps->count() > 0){
                foreach ($gh_pending->provideHelps as $gh_ph){
                    if (!$gh_ph->merge->is_confirmed){
                        $gh_pending_amount_on_processing += $gh_ph->merge->merge_amount;
                    }
                    else{
                        $gh_pending_amount_paid += $gh_ph->merge->merge_amount;
                    }
                }
            }
        }


        /*Five Latest Transactions*/
        $ph_all_completed = ProvideHelp::where('user_id', $user_id)->where('status', 'completed')->get();
        $ph_all_cancelled = ProvideHelp::where('user_id', $user_id)->where('status', 'cancelled')->get();
        $gh_all_completed = GetHelp::where('user_id', $user_id)->where('status', 'completed')->get();
        $gh_all_cancelled = GetHelp::where('user_id', $user_id)->where('status', 'cancelled')->get();
        $all_transactions_ph = $ph_all_completed->merge($ph_all_cancelled);
        $all_transactions_gh = $gh_all_completed->merge($gh_all_cancelled);
        $all_five_latest_transactions_ph = $all_transactions_ph->sortByDesc('created_at')->take(3);
        $all_five_latest_transactions_gh = $all_transactions_gh->sortByDesc('created_at')->take(3);
        return view('user.dashboard', compact(
            'ph_pending', 'gh_pending', 'ph_activation',
            'ph_activation_amount_left_to_balance','ph_activation_amount',
            'ph_activation_amount_on_processing','ph_activation_amount_paid', 'ph_activation_earliest_merge_expiration',
            'ph_pending_amount_left_to_balance', 'ph_pending_amount',
            'ph_pending_amount_on_processing', 'ph_pending_amount_paid', 'ph_earliest_merge_expiration',
            'gh_pending_amount_left_to_balance', 'gh_pending_amount',
            'gh_pending_amount_on_processing', 'gh_pending_amount_paid', 'gh_earliest_merge_expiration',
            'user_reactivation_fee', 'user_profit_for_the_month', 'sub_expires_at',
            'all_five_latest_transactions_ph', 'all_five_latest_transactions_gh'
        ));
    }

    private function checkUserStatus(){
        $user = Auth::user();
        $get_pending_ph = ProvideHelp::where('user_id', $user->id)
            ->where('status', 'pending')->first();
        $get_pending_gh = GetHelp::where('user_id', $user->id)
            ->where('status', 'pending')->first();

        if ($user->sub_expires_at){
            if (now() >= $user->sub_expires_at){
                if (!$get_pending_gh || !$get_pending_ph){
                    $user->update([
                        'is_activated' =>false
                    ]);
                }
            }
        }

        $total_referrals = $user->referrerDetail->referralHistories->count();
        $total_ph  = 0;
        $get_ph_amounts = ProvideHelp::where('user_id', $user->id)
            ->where('status', 'completed')->where('is_activation_fee', false)->get();
        if ($get_ph_amounts->count() > 0){
            foreach ($get_ph_amounts as $row){
                $total_ph += $row->amount;
            }
        }
        if ($total_referrals >= 25 && $total_ph >= 50000){
            if (!$user->is_guider){
                $user->update([
                    'is_guider' =>true
                ]);
            }
        }

        if ($get_pending_ph){
            $expired_merge_exist = false;
            if ($get_pending_ph->unConfirmedGh->count() > 0){
                foreach ($get_pending_ph->unConfirmedGh as $unconfirmed_merge){
                    /*Check if any of the merge has expired then refund and unmerge users on that particular merge*/
                    /*dd(self::receiptExist($unconfirmed_merge, 'provide_help_id'));*/
                    if ($unconfirmed_merge->merge->expires_at <= now()
                        && !self::receiptExist($unconfirmed_merge, 'provide_help_id')){
                        $get_gh = GetHelp::where('id', $unconfirmed_merge->merge->get_help_id)->first();
                        $get_ph = ProvideHelp::where('id', $unconfirmed_merge->merge->provide_help_id)->first();
                        if (!$get_ph->is_activation_fee){
                            $get_gh->update([
                                'to_balance' => $get_gh->to_balance + $unconfirmed_merge->merge->merge_amount
                            ]);
                            $get_ph->update([
                                'to_balance' => $get_ph->to_balance + $unconfirmed_merge->merge->merge_amount,
                                'is_merged' => false,
                                'has_expired_merge' => true,
                                'status' => 'pending',
                            ]);
                        }
                        $get_pending_ph->unConfirmedGh()->detach($unconfirmed_merge->merge->get_help_id);
                        $expired_merge_exist = true;
                    }
                }
            }
            /*Check if expired merge merges exist and count row*/
            if ($expired_merge_exist){
                /*
                 * Check if there are still merges..
                 * unmerge all of them expect the merge that has receipt..
                 * MERGES WITH RECEIPT WILL BE RESOLVED BY THE ADMIN..
                 * CHECK ResolveIssuesController class.. then unmergeUsersFakePaymentIssue() function
                */
                if ($get_pending_ph->unConfirmedGh->count() > 0){
                    foreach ($get_pending_ph->unConfirmedGh as $unconfirmed_merge){
                        if (!self::receiptExist($unconfirmed_merge, 'provide_help_id')){
                            $get_gh = GetHelp::where('id', $unconfirmed_merge->merge->get_help_id)->first();
                            $get_ph = ProvideHelp::where('id', $unconfirmed_merge->merge->provide_help_id)->first();
                            if (!$get_ph->is_activation_fee){
                                $get_gh->update([
                                    'to_balance' => $get_gh->to_balance + $unconfirmed_merge->merge->merge_amount
                                ]);
                                $get_ph->update([
                                    'to_balance' => $get_ph->to_balance + $unconfirmed_merge->merge->merge_amount,
                                    'is_merged' => false,
                                    'has_expired_merge' => true,
                                    'status' => 'pending',
                                ]);
                            }
                            $get_pending_ph->unConfirmedGh()->detach($unconfirmed_merge->merge->get_help_id);
                        }
                    }
                }

                if ($get_pending_ph->unConfirmedGh->count() == 0 && !$get_pending_ph->is_activation_fee){
                    /*Check if no more merge.. Block the user and set ph status to cancelled*/
                    $get_pending_ph->update([
                        'status' => 'cancelled',
                    ]);
                    $user->update([
                        'is_blocked' => true,
                    ]);
                }
            }
        }

        if ($get_pending_gh){
            if ($get_pending_gh->unConfirmedPh->count() > 0){
                foreach ($get_pending_gh->unConfirmedPh as $unconfirmed_merge){
                    if ($unconfirmed_merge->merge->expires_at <= now()
                        && !self::ghReceiptExist($unconfirmed_merge, 'get_help_id')){
                        $get_gh = GetHelp::where('id', $unconfirmed_merge->merge->get_help_id)->first();
                        $get_gh->update([
                            'to_balance' => $get_gh->to_balance + $unconfirmed_merge->merge->merge_amount
                        ]);
                        $get_ph = ProvideHelp::where('id', $unconfirmed_merge->merge->provide_help_id)->first();
                        if ($get_ph->is_activation_fee){
                            $get_ph->update([
                                'to_balance' => $unconfirmed_merge->merge->merge_amount,
                                'is_merged' => false,
                                'has_expired_merge' => true,
                                'status' => 'pending',
                            ]);
                        }
                        else{
                            $get_ph->update([
                                'to_balance' => $get_ph->to_balance + $unconfirmed_merge->merge->merge_amount,
                                'is_merged' => false,
                                'has_expired_merge' => true,
                                'status' => 'pending',
                            ]);
                        }
                        $get_pending_gh->unConfirmedPh()->detach($unconfirmed_merge->merge->provide_help_id);
                    }
                }
            }
        }
    }

    public function payActivationFee()
    {
        $check = ProvideHelp::where('user_id', Auth::id())->where('status', 'pending')->first();
        if ($check){
            return redirect(route('dashboard'))->with('danger', 'You have a pending request');
        }
        /*Double checking*/
        ProvideHelp::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'status' => 'pending',
            ],
            [
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
        if ($get_ph->getHelps->count() > 0){
            return redirect(route('dashboard'))->with('danger', 'Request cannot be cancelled because it has already been merged');
        }
        $get_ph->delete();
        session()->flash('success', 'Request cancelled successfully');
        return redirect(route('dashboard'));
    }

    public function uploadPaymentReceipt(Request $request, $ph_id, $gh_id)
    {
        if (!$ph_id || !$gh_id){
            session()->flash('danger', 'Something went wrong');
        }
        $get_merge = DB::table('merges')
            ->where('provide_help_id', $ph_id)
            ->where('get_help_id', $gh_id)
            ->first();
        if (!$get_merge){
            return redirect()->back()->with('danger', 'Something went wrong');
        }
        $get_merge_amount = $get_merge->merge_amount;
        if (!$request->hasFile('receipt')) {
            return redirect()->back()->with('danger', "\"Select Receipt\" image before clicking \"Upload\"");
        }
        /*FirstOrCreate should handle this but it will not display any message*/
        $receipt_exist = ReceiptUpload::where('provide_help_id', $ph_id)
            ->where('get_help_id', $gh_id)->first();
        if ($receipt_exist){
            return redirect(route('dashboard'))
                ->with('danger', 'You have already uploaded a receipt');
        }

        $this->validate($request, [
            'receipt' => 'bail|required|image|max:1024',
        ]);
        $image = $request->file('receipt');
        $receipt = ReceiptUpload::uploadReceiptToStorage($image);

        ReceiptUpload::firstOrCreate(
            [
                'provide_help_id' => $ph_id,
                'get_help_id' => $gh_id,
            ],
            [
            'image' => $receipt,
            'merge_amount' => $get_merge_amount,
            'token' => Str::random(39),
            ]
        );
        session()->flash('success', 'Receipt uploaded successfully');
        return redirect(route('dashboard'));
    }

    public function payReactivationFee(Request $request)
    {
        if($request->has('reactivation_fee')) {

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
                $check = ProvideHelp::where('user_id', Auth::id())->where('status', 'pending')->first();
                if ($check){
                    return redirect(route('dashboard'))->with('danger', 'You have a pending request');
                }
                ProvideHelp::firstOrCreate(
                    [
                        'user_id' => Auth::id(),
                        'status' => 'pending',
                    ],
                    [
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
        $check = ProvideHelp::where('user_id', Auth::id())->where('status', 'pending')->first();
        if ($check){
            return redirect(route('dashboard'))->with('danger', 'You have a pending request');
        }
        ProvideHelp::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'status' => 'pending',
            ],
            [
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
        if ($get_ph->getHelps->count() > 0){
            return redirect(route('dashboard'))->with('danger', 'Request cannot be cancelled because it has already been merged');
        }
        $get_ph->delete();
        session()->flash('success', 'Request cancelled successfully');
        return redirect(route('dashboard'));
    }

    public function cancelGetHelp($token)
    {
        $get_gh = GetHelp::where('token', $token)->first();
        if ($get_gh->provideHelps->count() > 0){
            return redirect(route('dashboard'))->with('danger', 'Request cannot be deleted because it has already been merged');
        }
        $added_referral_bonus = $get_gh->added_referral_bonus;
        /*Return user's referral bonus*/
        Auth::user()->referrerDetail->update([
            'referrer_balance' => Auth::user()->referrerDetail->referrer_balance + $added_referral_bonus
        ]);
        if ($get_gh->provide_help_id){
            ProvideHelp::where('id', $get_gh->provide_help_id)->update(['is_withdrawn' => false]);
        }
        $get_gh->delete();
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
        $get_expires_at_row = DB::table('merges')
            ->where('provide_help_id', $ph_id)
            ->where('get_help_id', $gh_id)
            ->first();
        if (!$get_expires_at_row){
            return redirect(route('dashboard'))->with('danger', 'Something went wrong');
        }
        if ($get_receipt){
            $get_receipt->update([
                'is_fake' => true,
                'expires_at' => $get_expires_at_row->expires_at,
                ]
            );
            return redirect(route('dashboard'))->with('success', 'Receipt has been flagged as fake');
        }
        else{
            return redirect(route('dashboard'))->with('danger', 'Something went wrong');
        }
    }

    public function paymentConfirmation($ph_token, $gh_token)
    {
        $user_id = Auth::id();
        $ph = ProvideHelp::where('token', $ph_token)->first();
        $ph_id = $ph->id;
        $gh = GetHelp::where('token', $gh_token)->first();
        $gh_id = $gh->id;

        /*Confirm payment on merge table*/
        $gh->provideHelps()->updateExistingPivot($ph_id, [
            'is_confirmed' => true,
        ]);

        /*Confirm payment on receiptUploads*/
        $get_receipt = ReceiptUpload::where('provide_help_id', $ph_id)->where('get_help_id', $gh_id)->first();
        if ($get_receipt){
            $get_receipt->update([
                'is_confirmed' => true
            ]);
        }

        /*Update GH if there is no more unconfirmed PH*/
        if ($gh->unConfirmedPh->count() == 0 && $gh->is_merged){
            $gh->update([
                'status' => 'completed'
            ]);
        }


        /*Update PH*/
        if ($ph->is_activation_fee){
            if (!$ph->user->is_activated){
                if ($ph->user->activation == 'first'){
                    $ph->user->update([
                        'activation' => 'subsequent'
                    ]);
                }
                $ph->user->update([
                    'is_activated' => true ,
                    'sub_expires_at' => now()->addDays(30),
                ]);
                $ph->update([
                    'status' => 'completed'
                ]);
            }
            elseif ($ph->user->is_blocked){
                $ph->user->update([
                    'is_blocked' => false
                ]);
                $ph->update([
                    'status' => 'completed'
                ]);
            }
            else{
                return redirect(route('dashboard'))->with('danger', 'Something went wrong');
            }
        }
        else{
            if ($ph->unConfirmedGh->count() == 0 && $ph->is_merged){
                $ph->update([
                    'status' => 'completed'
                ]);
            }
            /*else{
                return redirect(route('dashboard'))->with('danger', 'Something went wrong');
            }*/


            /*Handle referrer bonus*/
            $user = $ph->user;
            $referrer_id = $user->referred_from_id;
            $ph_amount = $ph->amount;

            if ($referrer_id){
                $get_referrer = User::where('id', $referrer_id)->first();
                $is_guider = $get_referrer->is_guider;
                if ($is_guider){
                    $guider_referral_bonus = $ph_amount * 0.04;
                    $new_balance = $get_referrer->referrerDetail->referrer_balance + $guider_referral_bonus;
                    $get_referrer->referrerDetail->update([
                        'referrer_balance' => $new_balance
                    ]);
                }
                else{
                    $user_referral_bonus = $ph_amount * 0.02;
                    $new_balance = $get_referrer->referrerDetail->referrer_balance + $user_referral_bonus;
                    $get_referrer->referrerDetail->update([
                        'referrer_balance' => $new_balance
                    ]);
                }

                $referred_user_exist = ReferralHistory::where('referred_user_id', $user->id)
                    ->where('referrer_details_id', $get_referrer->referrerDetail->id)
                    ->first();
                if (!$referred_user_exist){
                    ReferralHistory::firstOrCreate([
                        'referred_user_id' => $user->id,
                        'referrer_details_id' => $get_referrer->referrerDetail->id,
                    ]);
                }
            }
        }

        return redirect(route('dashboard'))->with('success', 'User\'s payment has been confirmed');

    }
}
