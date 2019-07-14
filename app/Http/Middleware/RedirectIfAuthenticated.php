<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard('student')->check()) {
            return redirect()->intended(route('stud_Index'));
        }else if(Auth::guard('company')->check()){
            return redirect()->intended(route('company_profile'));
        }else if(Auth::guard('supervisor')->check()){
            return redirect()->intended(route('studentList'));
        }else if(Auth::guard('admin')->check()){
            return redirect()->intended(route('studList'));
        }
        return $next($request);
    }
}
