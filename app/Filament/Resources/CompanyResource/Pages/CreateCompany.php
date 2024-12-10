<?php

namespace App\Filament\Resources\CompanyResource\Pages;

use App\Filament\Resources\CompanyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use create;

class CreateCompany extends CreateRecord
{
    protected static string $resource = CompanyResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Menambahkan user_id ke data sebelum menyimpan
        $data['user_id'] = Auth::id();  // Mengisi user_id dengan ID pengguna yang sedang login

        return $data;  // Mengembalikan data yang telah dimodifikasi
    }
}
