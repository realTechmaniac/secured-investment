<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProvideHelpController extends Controller
{
    public function gotoProvideHelp()
    {
        return view('user.provide-help');
    }

    public function saveProvideHelp(Request $request)
    {
        if ($request->ph_amount >= 2000 && $request->ph_amount <=100000){

            return redirect()->back()->with('success', 'Valid amount');
        }else{
            return redirect()->back()->with('danger', 'Amount can not be lesser than NGN 2,000 or greater than NGN 100,000 ');
        }
    }
}
