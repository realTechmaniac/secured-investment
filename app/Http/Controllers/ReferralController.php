<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferralController extends Controller
{
    public function showReferrals()
    {
        $refs = Auth::user()->referrerDetail->referralHistories;
        return view('user.referrals', compact('refs'));
    }
}
