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
        $total_completed_ph_amount = 0;
        $currently_active_transactions = DB::table('merges')->get();
        foreach ($total_completed_ph as $item){
            $total_completed_ph_amount += $item->amount;
        }
        $total_completed_gh_amount = 0;
        foreach ($total_completed_gh as $item){
            $total_completed_gh_amount += $item->amount;
        }

        return view('admin.dashboard', compact(
            'total_user', 'total_completed_ph', 'total_completed_gh',
            'total_completed_ph_amount', 'total_completed_gh_amount', 'currently_active_transactions'
        ));
    }
}
