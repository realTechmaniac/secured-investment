<?php

namespace App\Http\Middleware;

use App\GetHelp;
use App\ProvideHelp;
use Closure;
use Illuminate\Support\Facades\Auth;

class HasPending
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
        $ph_pending = ProvideHelp::where('user_id', Auth::id())
            ->where('status', 'pending')
            ->first();
        $gh_pending = GetHelp::where('user_id', Auth::id())
            ->where('status', 'pending')
            ->first();
        if ($ph_pending || $gh_pending){
            return redirect(route('dashboard'))->with('danger', 'Access denied');
        }
        return $next($request);
    }
}
