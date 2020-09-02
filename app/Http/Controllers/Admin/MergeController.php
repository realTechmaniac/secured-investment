<?php

namespace App\Http\Controllers\Admin;

use App\GetHelp;
use App\Http\Controllers\Controller;
use App\ProvideHelp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Telegram\Bot\Laravel\Facades\Telegram;

class MergeController extends Controller
{
    public function showPendingPh($gh_token = null)
    {
        $pending_ph = ProvideHelp::where('to_balance', '>', 0)->get();
        $gh = GetHelp::where('token', $gh_token)->first();
        return view('admin.merge-pending-ph', compact('pending_ph', 'gh'));
    }

    public function showPendingGh($ph_token = null)
    {
        $pending_gh = GetHelp::where('to_balance', '>', 0)->get();
        $ph = ProvideHelp::where('token', $ph_token)->first();
        return view('admin.merge-pending-gh', compact('pending_gh', 'ph'));
    }

    public function mergePendingPh($ph_token, $gh_token)
    {
        $gh = GetHelp::where('token', $gh_token)->first();
        $ph = ProvideHelp::where('token', $ph_token)->first();
        $check = DB::table('merges')
                ->where('get_help_id',$gh->id)
                ->where('provide_help_id',$ph->id)
                ->count() > 0;

        if ($check){
            return redirect(route('show.pending.gh'))->with('danger', 'You have already merged these users');
        }

        if ($gh && $ph){
            $ph_id = $ph->id;
            $ph_to_balance = $ph->to_balance;
            $gh_to_balance = $gh->to_balance;

            if ($gh_to_balance > $ph_to_balance){
                $gh->update([
                    'to_balance' => $gh_to_balance - $ph_to_balance
                ]);
                $ph->update([
                    'to_balance' => 0,
                    'is_merged' => true,
                ]);
                $gh->provideHelps()->attach($ph_id, [
                    'merge_amount' => $ph_to_balance,
                    'is_confirmed' => false,
                    'expires_at' => now()->addHours(12),
                ]);

                /*$text = "Dear <b>".$ph->user->username."</b>, you have been merged to make a payment of &#8358;".$ph_to_balance.". Login to view details";

                Telegram::sendMessage([
                    'chat_id' => -1001308789917,
                    'parse_mode' => 'HTML',
                    'text' => $text
                ]);*/
            }
            elseif ($gh_to_balance < $ph_to_balance){
                $gh->update([
                    'to_balance' => 0,
                    'is_merged' => true,
                ]);
                $ph->update([
                    'to_balance' => $ph_to_balance - $gh_to_balance,
                ]);
                $gh->provideHelps()->attach($ph_id, [
                    'merge_amount' => $gh_to_balance,
                    'is_confirmed' => false,
                    'expires_at' => now()->addHours(12),
                ]);

                /*$text = "Dear <b>".$ph->user->username."</b>, you have been merged to make a payment of &#8358;".$gh_to_balance.". Login to view details";

                Telegram::sendMessage([
                    'chat_id' => -1001308789917,
                    'parse_mode' => 'HTML',
                    'text' => $text
                ]);*/
            }
            elseif ($gh_to_balance == $ph_to_balance){
                $gh->update([
                    'to_balance' => 0,
                    'is_merged' => true,
                ]);
                $ph->update([
                    'to_balance' => 0,
                    'is_merged' => true,
                ]);
                $gh->provideHelps()->attach($ph_id, [
                    'merge_amount' => $gh_to_balance,
                    'is_confirmed' => false,
                    'expires_at' => now()->addHours(12),
                ]);

                /*$text = "Dear <b>".$ph->user->username."</b>, you have been merged to make a payment of &#8358;".$gh_to_balance.". Login to view details";

                Telegram::sendMessage([
                    'chat_id' => -1001308789917,
                    'parse_mode' => 'HTML',
                    'text' => $text
                ]);*/
            }
            else{
                session()->flash('danger', 'Data not available or accurate');
                return redirect(route('show.pending.gh'));
            }
            session()->flash('success', 'Merge successful');
        }
        else{
            session()->flash('danger', 'Something went wrong');
        }

        return redirect(route('show.pending.gh'));
    }

    public function mergePendingGh($gh_token, $ph_token)
    {
        $ph = ProvideHelp::where('token', $ph_token)->first();
        $gh = GetHelp::where('token', $gh_token)->first();

        $check = DB::table('merges')
                ->where('get_help_id',$gh->id)
                ->where('provide_help_id',$ph->id)
                ->count() > 0;

        if ($check){
            return redirect(route('show.pending.ph'))->with('danger', 'You have already merged these users');
        }

        if ($ph && $gh){
            $gh_id = $gh->id;
            $ph_to_balance = $ph->to_balance;
            $gh_to_balance = $gh->to_balance;

            if ($ph_to_balance > $gh_to_balance){
                $ph->update([
                    'to_balance' => $ph_to_balance - $gh_to_balance
                ]);
                $gh->update([
                    'to_balance' => 0,
                    'is_merged' => true,
                ]);
                $ph->getHelps()->attach($gh_id, [
                    'merge_amount' => $gh_to_balance,
                    'is_confirmed' => false,
                    'expires_at' => now()->addHours(12),
                ]);

                /*$text = "Dear <b>".$ph->user->username."</b>, you have been merged to make a payment of &#8358;".$gh_to_balance.". Login to view details";

                Telegram::sendMessage([
                    'chat_id' => -1001308789917,
                    'parse_mode' => 'HTML',
                    'text' => $text
                ]);*/
            }
            elseif ($ph_to_balance < $gh_to_balance){
                $ph->update([
                    'to_balance' => 0,
                    'is_merged' => true,
                ]);
                $gh->update([
                    'to_balance' => $gh_to_balance - $ph_to_balance
                ]);
                $ph->getHelps()->attach($gh_id, [
                    'merge_amount' => $ph_to_balance,
                    'is_confirmed' => false,
                    'expires_at' => now()->addHours(12),
                ]);

                /*$text = "Dear <b>".$ph->user->username."</b>, you have been merged to make a payment of &#8358;".$ph_to_balance.". Login to view details";

                Telegram::sendMessage([
                    'chat_id' => -1001308789917,
                    'parse_mode' => 'HTML',
                    'text' => $text
                ]);*/
            }
            elseif ($ph_to_balance == $gh_to_balance){
                $ph->update([
                    'to_balance' => 0,
                    'is_merged' => true,
                ]);
                $gh->update([
                    'to_balance' => 0,
                    'is_merged' => true,
                ]);
                $ph->getHelps()->attach($gh_id, [
                    'merge_amount' => $ph_to_balance,
                    'is_confirmed' => false,
                    'expires_at' => now()->addHours(12),
                ]);

                /*$text = "Dear <b>".$ph->user->username."</b>, you have been merged to make a payment of &#8358;".$ph_to_balance.". Login to view details";

                Telegram::sendMessage([
                    'chat_id' => -1001308789917,
                    'parse_mode' => 'HTML',
                    'text' => $text
                ]);*/
            }
            else{
                session()->flash('danger', 'Data not available or accurate');
                return redirect(route('show.pending.ph'));
            }
            session()->flash('success', 'Merge successful');
        }
        else{
            session()->flash('danger', 'Something went wrong');
        }

        return redirect(route('show.pending.ph'));
    }


}
