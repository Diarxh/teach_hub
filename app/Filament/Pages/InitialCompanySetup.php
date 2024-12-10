<?php

namespace App\Filament\Pages;

use App\Models\Company;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class InitialCompanySetup extends Page
{
    use InteractsWithForms;

    protected static ?string $slug = 'initial-company-setup';  // Tambahkan ini
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.initial-company-setup';
    protected static bool $shouldRegisterNavigation = false;

    public ?array $data = [];

    public function mount(): void
    {
        // Hanya redirect jika sudah punya company
        if (auth()->user()->company) {
            redirect()->route('filament.admin.pages.dashboard');
            return;  // Hanya perlu return di sini
        }

        // Hanya untuk role perusahaan
        if (!auth()->user()->hasRole('perusahaan')) {
            redirect()->route('filament.admin.pages.dashboard');
            return;  // Hanya perlu return di sini
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('company_name')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Perusahaan'),
                TextInput::make('address')
                    ->required()
                    ->maxLength(255)
                    ->label('Alamat'),
                TextInput::make('phone_number')
                    ->required()
                    ->tel()
                    ->label('No. Telepon'),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                FileUpload::make('logo')
                    ->image()
                    ->directory('company-logos'),
                Textarea::make('description')
                    ->label('Deskripsi'),
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        $data = $this->form->getState();
        $data['user_id'] = auth()->id();

        Company::create($data);

        Notification::make()
            ->title('Data perusahaan berhasil disimpan')
            ->success()
            ->send();

        redirect()->route('filament.admin.pages.dashboard');
    }
}
