<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        // if (Auth::guard('staff')->check()) {
        //     return redirect()->route('staff.dashboard');
        // }

        // if (Auth::guard('customer')->check()) {
        //     return redirect()->route('customer.dashboard');
        // }

        return $next($request);
    }
}
