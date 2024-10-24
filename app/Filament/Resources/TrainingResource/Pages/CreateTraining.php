<?php

namespace App\Filament\Resources\TrainingResource\Pages;

use App\Filament\Resources\TrainingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateTraining extends CreateRecord
{
    protected static string $resource = TrainingResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Menambahkan user_id ke data sebelum menyimpan
        $data['user_id'] = Auth::id();  // Mengisi user_id dengan ID pengguna yang sedang login

        return $data;  // Mengembalikan data yang telah dimodifikasi
    }
}
