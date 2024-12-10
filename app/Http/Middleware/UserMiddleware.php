<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna terautentikasi dan memiliki peran yang sesuai
        if (Auth::check() && (Auth::user()->hasRole('user') || Auth::user()->hasRole('guru'))) {
            return $next($request);
        }

        return redirect('/')->withErrors(['role' => 'Akses ditolak.']);
    }
}