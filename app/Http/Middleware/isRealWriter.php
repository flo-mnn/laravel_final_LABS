<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isRealWriter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && ($request->route()->parameters()['post']->user_id == Auth::id() || Auth::id() == 1 || Auth::id() == 2)) {
            return $next($request);
        } else {
            return redirect()->back();
        }
    }
}
