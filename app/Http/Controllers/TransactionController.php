<?php

namespace App\Http\Controllers;

use App\GetHelp;
use App\ProvideHelp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function showTransactions()
    {
        /*All Transactions*/
        $user_id = Auth::id();
        $ph_all_completed = ProvideHelp::where('user_id', $user_id)->where('status', 'completed')->get();
        $ph_all_cancelled = ProvideHelp::where('user_id', $user_id)->where('status', 'cancelled')->get();
        $gh_all_completed = GetHelp::where('user_id', $user_id)->where('status', 'completed')->get();
        $gh_all_cancelled = GetHelp::where('user_id', $user_id)->where('status', 'cancelled')->get();
        $all_transactions_ph = $ph_all_completed->merge($ph_all_cancelled);
        $all_transactions_gh = $gh_all_completed->merge($gh_all_cancelled);
        return view('user.transactions', compact('all_transactions_ph', 'all_transactions_gh'));
    }
}
