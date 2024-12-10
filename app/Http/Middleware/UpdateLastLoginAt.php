<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateLastLoginAt
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // Pastikan user yang terautentikasi adalah instance dari model User
            $user = Auth::user();
            if ($user) {
                $user->update([
                    'last_login_at' => now(),
                ]);
            }
        }

        return $next($request);
    }
}