<?php

namespace App\Http\Middleware\Bank;

use App\BankDetail;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class BankDetails
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()){
            $bank_details_exist = BankDetail::where('user_id', Auth::id())->first();
            if (!$bank_details_exist){
                return $next($request);
            }
            session()->flash('danger', 'Page not available');
            return redirect(route('login'));
        }
        session()->flash('danger', 'Page not available');
        return redirect(route('login'));
    }
}
