<?php

namespace App\Http\Controllers;

use App\BankDetail;
use App\ReferrerDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BankDetailsController extends Controller
{
    public function bankDetails()
    {
        return view('auth.register-bank-details');
    }

    public function storeBankDetails(Request $request)
    {
        $this->validate($request , [
            'full_name' => ['bail', 'required', 'string', 'max:100'],
            'bank_name' => ['bail', 'required', 'string', 'max:100'],
            'account_number' => ['bail', 'required', 'digits:10'],
        ]);

        BankDetail::create([
            'user_id' => Auth::id(),
            'full_name' => $request->full_name,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'token' => Str::random(40),
        ]);

        ReferrerDetail::create([
            'user_id' => Auth::id(),
            'referrer_link' => 'ref='.Str::random(40),
            'referrer_balance' => 0,
            'token' => Str::random(40),
        ]);

        session()->flash('success', 'Registration successful');

        return redirect(route('dashboard'));
    }
}
