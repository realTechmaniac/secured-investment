<?php

namespace App\Http\Middleware\Bank;

use App\BankDetail;
use Closure;
use Illuminate\Support\Facades\Auth;

class BankRedirect
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
        $bank_details_exist = BankDetail::where('user_id', Auth::id())->first();
        if (!$bank_details_exist){
            session()->flash('danger', 'Fill this form to complete your registration');
            return redirect(route('bank.details'));
        }
        return $next($request);
    }
}
