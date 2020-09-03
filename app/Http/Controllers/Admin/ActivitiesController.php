<?php

namespace App\Http\Controllers\Admin;

use App\GetHelp;
use App\Http\Controllers\Controller;
use App\ProvideHelp;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivitiesController extends Controller
{
    public function dashboard()
    {
        $total_user = User::all();
        $total_completed_ph = ProvideHelp::where('status', 'completed')->get();
        $total_completed_gh = GetHelp::where('status', 'completed')->get();
        $total_pending_ph = ProvideHelp::where('status', 'pending')->get();
        $total_pending_gh = GetHelp::where('status', 'pending')->get();
        $total_pending_ph_to_balance = 0;
        $currently_active_transactions = DB::table('merges')->get();
        foreach ($total_pending_ph as $item){
            $total_pending_ph_to_balance += $item->to_balance;
        }
        $total_pending_gh_to_balance = 0;
        foreach ($total_pending_gh as $item){
            $total_pending_gh_to_balance += $item->to_balance;
        }

        return view('admin.dashboard', compact(
            'total_user', 'total_pending_ph', 'total_pending_gh',
            'total_completed_gh', 'total_completed_ph',
            'total_pending_ph_to_balance', 'total_pending_gh_to_balance', 'currently_active_transactions'
        ));
    }
}
