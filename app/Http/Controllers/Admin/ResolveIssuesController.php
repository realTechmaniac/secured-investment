<?php

namespace App\Http\Controllers\Admin;

use App\GetHelp;
use App\Http\Controllers\AppMainTrait;
use App\Http\Controllers\Controller;
use App\ProvideHelp;
use App\ReceiptUpload;
use App\ReferralHistory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResolveIssuesController extends Controller
{
    use AppMainTrait;
    public function fakeReceiptIssues()
    {
        $get_fake_receipt = ReceiptUpload::where('is_fake', true)
            ->where('action_taken', false)
            ->get();

        return view('admin.fake-receipt-issue', compact('get_fake_receipt'));
    }

    public function clearFakePaymentIssue($token)
    {
        $get_receipt = ReceiptUpload::where('token', $token)->first();
        if (!$get_receipt){
            return redirect()->back()->with('danger', 'Something went wrong');
        }
        $get_receipt->update([
            'action_taken' => true,
        ]);
        return redirect()->back()->with('success', 'Issue has been resolved successfully');
    }

    public function unconfirmedUserPayment()
    {
        $get_all_unconfirmed_receipts = ReceiptUpload::where('is_confirmed', false)->get();
        return view('admin.unconfirmed-receipt-issue', compact('get_all_unconfirmed_receipts'));
    }

    public function blockPhUserFakePaymentIssue($token)
    {
        $receipt = ReceiptUpload::where('token', $token)->first();
        $ph_user_id = $receipt->provideHelp->user->id;
        $get_ph_user = User::where('id', $ph_user_id)->first();
        $get_ph_user->update([
           'is_blocked' => true
        ]);
        return redirect()->back()->with('success', 'PH User Blocked Successfully');
    }

    public function blockGhUserFakePaymentIssue($token)
    {
        $receipt = ReceiptUpload::where('token', $token)->first();
        $gh_user_id = $receipt->getHelp->user->id;
        $get_gh_user = User::where('id', $gh_user_id)->first();
        $get_gh_user->update([
            'is_blocked' => true
        ]);
        return redirect()->back()->with('success', 'GH User Blocked Successfully');
    }

    public function confirmFakePaymentIssue($token)
    {
        /*
         * This function is repetition of paymentConfirmation() function in UserController.
         * Refactor to a cleaner code if time permits
         * */
        $receipt = ReceiptUpload::where('token', $token)->first();
        $ph_token = $receipt->provideHelp->token;
        $gh_token = $receipt->getHelp->token;

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

        return redirect()->back()->with('success', 'User\'s payment receipt has been confirmed');
    }

    public function unmergeUsersFakePaymentIssue($token)
    {
        $receipt = ReceiptUpload::where('token', $token)->first();
        $ph_id = $receipt->provideHelp->id;
        $get_ph = ProvideHelp::where('id', $ph_id)->first();
        $gh_id = $receipt->getHelp->id;
        $get_gh = GetHelp::where('id', $gh_id)->first();

        if (!$receipt){
            return  redirect()->back()->with('danger', 'No receipt found');
        }
        if (!$get_ph){
            return  redirect()->back()->with('danger', 'No provide help found');
        }
        if (!$get_ph){
            return  redirect()->back()->with('danger', 'No get help found');
        }

        $get_gh->update([
            'to_balance' => $get_gh->to_balance + $receipt->merge_amount
        ]);

        if ($get_ph->unConfirmedGh->count() == 1){
            $get_ph->update([
                'to_balance' => $get_ph->to_balance + $receipt->merge_amount,
                'is_merged' => true,
                'status' => 'cancelled',
            ]);
        }
        elseif ($get_ph->unConfirmedGh->count() > 1){
            $get_ph->update([
                'to_balance' => $get_ph->to_balance + $receipt->merge_amount,
            ]);
        }
        else{
            return  redirect()->back()->with('danger', 'Something went wrong');
        }
        $get_ph->unConfirmedGh()->detach($gh_id);

        return  redirect()->back()->with('success', 'User Unmerged Successfully');
    }
}
