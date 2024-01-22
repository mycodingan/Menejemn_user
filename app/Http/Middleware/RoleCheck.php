<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleCheck
{
    /public function handle(Request $request, Closure $next, ...$roles){
        foreach ($roles as $role) {
            if (Auth::check() && Auth::user()->role == $role) {
                return $next($request);
            }
        }
        Auth::logout();
        return redirect()->route('login')->with('status','Berhasil');
    }
    // public function handle(Request $request, Closure $next)
    // {
    //     return $next($request);
    // }
}
