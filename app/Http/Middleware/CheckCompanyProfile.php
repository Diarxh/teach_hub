<?php

namespace App\Http\Middleware;

use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Closure;

class CheckCompanyProfile
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->hasRole('perusahaan')) {
            // Tambahkan pengecualian untuk route initial setup
            if (!auth()->user()->company &&
                    !$request->routeIs('filament.admin.pages.initial-company-setup') &&
                    !$request->routeIs('filament.admin.resources.companies.create')) {
                Notification::make()
                    ->title('Lengkapi Data Perusahaan')
                    ->warning()
                    ->body('Silakan lengkapi data perusahaan Anda terlebih dahulu.')
                    ->persistent()
                    ->send();

                return redirect()->route('filament.admin.pages.initial-company-setup');
            }
        }

        return $next($request);
    }
}
