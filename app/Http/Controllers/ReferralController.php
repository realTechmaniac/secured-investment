<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferralController extends Controller
{
    public function showReferrals()
    {
        $refs = Auth::user()->referrerDetail->referralHistories;
        $user_that_referred = User::where('id', Auth::user()->referred_from_id)->first();
        $get_user_that_referred = null;
        if ($user_that_referred){
            $get_user_that_referred = $user_that_referred->username;
        }
        return view('user.referrals', compact('refs', 'get_user_that_referred'));
    }
}
