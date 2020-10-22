<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class NotActivated
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
        $is_activated = Auth::user()->is_activated;
        $is_blocked = Auth::user()->is_blocked;
        $sub_expires_at = Auth::user()->sub_expires_at;
        if (!$is_activated || $is_blocked || $sub_expires_at <= now()){
            return redirect(route('dashboard'))->with('danger', 'Access denied');
        }
        return $next($request);
    }
}
