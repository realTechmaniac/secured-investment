<?php

namespace App\Http\Controllers;

use App\GetHelp;
use App\ProvideHelp;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function userDashboard()
    {
        $user_id = Auth::id();
        $ph_activation = ProvideHelp::where('user_id', $user_id)->where('is_activation_fee', true)->first();
        $ph = ProvideHelp::where('user_id', $user_id)->where('is_activation_fee', false)->first();
        $gh = GetHelp::where('user_id', $user_id)->first();
        return view('user.dashboard', compact('ph', 'gh', 'ph_activation'));
    }

    public function payActivationFee()
    {
        ProvideHelp::create([
            'user_id' => Auth::id(),
            'amount' => 1000,
            'is_activation_fee' => true,
            'token' => Str::random(40),
        ]);

        session()->flash('success', 'Request sent successfully');

        return redirect(route('dashboard'));
    }

    public function cancelActivationFee($token)
    {
        $get_ph = ProvideHelp::where('token', $token)->first();
        $get_ph->delete();
        session()->flash('success', 'Request deleted successfully');
        return redirect(route('dashboard'));
    }
}
