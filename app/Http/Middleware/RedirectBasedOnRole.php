<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Closure;

class RedirectBasedOnRole
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $user = auth()->user();

            if ($user->hasRole(roles: 'perusahaan')) {
                // Jika user dengan role perusahaan mencoba mengakses dashboard admin
                if (request()->is('admin/dashboard')) {
                    return redirect()->route('filament.admin.pages.company-dashboard');
                }
            }

            if ($user->hasRole('super_admin')) {
                // Jika admin mencoba mengakses dashboard perusahaan
                if (request()->is('admin/company-dashboard')) {
                    return redirect()->route('filament.admin.pages.dashboard');
                }
            }
        }

        return $next($request);
    }
}
