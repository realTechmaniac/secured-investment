<?php

namespace App\Http\Controllers\Auth;

use App\BankDetail;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\ReferrerDetail;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectPath()
    {
        return '/register-bank-details';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:70'],
            'last_name' => ['required', 'string', 'max:70'],
            'phone' => ['required', 'string', 'max:20', 'unique:users', 'regex:/^(\+234)\d{10}$/'],
            'username' => ['required', 'string', 'max:70', 'unique:users'],
            'gender' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $referred_from_id = null;
        if ($data['ref'] != null){
            $idOfUserWhoReferredNewUser =
                ReferrerDetail::where('referrer_link', $data['ref'])->pluck('user_id')->first();
            if ($idOfUserWhoReferredNewUser){
                $referred_from_id = $idOfUserWhoReferredNewUser;
            }
        }
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'username' => $data['username'],
            'gender' => $data['gender'],
            'token' => Str::random(40),
            'email' => $data['email'],
            'referred_from_id' => $referred_from_id,
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm($ref = null)
    {
        return view('auth.register', compact('ref'));
    }
}
