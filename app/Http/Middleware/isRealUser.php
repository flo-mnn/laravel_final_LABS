<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isRealUser
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
        if ($request->route()->action['as'] == "users.password") {
            if (Auth::id() == $request->route()->parameters()['user']->id) {
                return $next($request);
            } else {
                return redirect()->back();
            }
        } else {
            if ($request->route()->action['as'] == "users.show") {
                if ($request->route()->parameters()['user']->id == Auth::id() || Auth::user()->role_id == 1 || Auth::user()->role_id == 2) {
                    return $next($request);
                } else {
                    return redirect()->back();
                }
            } else {
               if ($request->route()->parameters()['user']->id == Auth::id() || Auth::user()->role_id == 1) {
                    return $next($request);
               } else {
                    return redirect()->back();
               }
               
            }
        };
    }
}
