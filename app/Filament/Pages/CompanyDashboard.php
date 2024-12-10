<?php

namespace App\Filament\Pages;

use App\Models\Company;
use App\Models\Training;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class CompanyDashboard extends Page
{
    protected static ?string $slug = 'company-dashboard';
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.company-dashboard';

    protected static bool $shouldRegisterNavigation = true;

    public $totalData;
    public $trainings;
    public $trainingsPerMonth;
    public $trainingStatusCounts;
    public $companyInfo;

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->check() && auth()->user()->hasRole('perusahaan');
    }

    public function mount(): void
    {
        if (!auth()->user()->hasRole('perusahaan')) {
            Notification::make()
                ->title('Akses Ditolak')
                ->danger()
                ->body('Anda tidak memiliki akses ke halaman ini.')
                ->send();

            redirect()->route('filament.admin.pages.dashboard');
        }

        $this->totalData = Company::count();

        // Query untuk pelatihan terbaru
        $this->trainings = Training::where('company_id', auth()->user()->company_id)
            ->orderBy('start_date', 'desc')
            ->take(5)
            ->get();

        // Notifikasi jika tidak ada pelatihan
        if ($this->trainings->isEmpty()) {
            Notification::make()
                ->title('Tidak Ada Pelatihan Terbaru')
                ->body('Saat ini Anda belum memiliki pelatihan yang dijadwalkan.')
                ->info()
                ->send();
        }

        // Data statistik pelatihan per bulan
        $this->trainingsPerMonth = Training::where('company_id', auth()->user()->company_id)
            ->selectRaw("DATE_FORMAT(start_date, '%Y-%m') as month, COUNT(*) as count")
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Data rasio status pelatihan
        $this->trainingStatusCounts = Training::where('company_id', auth()->user()->company_id)
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        // Informasi singkat perusahaan, dengan pemeriksaan apakah company_id ada
        $this->companyInfo = auth()->user()->company_id
            ? Company::find(auth()->user()->company_id)
            : null;
    }


    protected function getHeaderWidgets(): array
    {
        return [];
    }

    public static function getNavigationLabel(): string
    {
        return 'Dashboard';
    }

    protected static ?int $navigationSort = 1;
}