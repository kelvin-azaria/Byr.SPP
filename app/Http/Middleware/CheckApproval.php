<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckApproval
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
        if (Auth::user()->approved) {
            return $next($request);
        } else {
            Auth::logout();
            return redirect(route('login'))->with('status','Akun anda belum disetujui oleh admin');
        }
    }
}
