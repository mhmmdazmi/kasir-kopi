<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // Jika pengguna sudah login, lanjutkan ke halaman yang diminta
            return $next($request);
        }

        // Jika pengguna belum login atau sudah logout, arahkan ke halaman login
        return redirect()->route('login');
    }
}
