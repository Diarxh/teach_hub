<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrainingResource\Pages;
use App\Models\Training;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon; // Pastikan Anda mengimpor Carbon di bagian atas file

class TrainingResource extends Resource
{
    protected static ?string $model = Training::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Pelatihan')
                            ->required()
                            ->placeholder('Masukkan nama pelatihan'),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->placeholder('Masukkan deskripsi pelatihan'),

                        Forms\Components\Textarea::make('requirements')
                            ->label('Persyaratan')
                            ->placeholder('Masukkan persyaratan pelatihan'),

                        Forms\Components\DatePicker::make('start_date')
                            ->label('Tanggal Mulai')
                            ->required()
                            ->default(Carbon::today()), // Mengatur default ke tanggal hari ini

                        Forms\Components\DatePicker::make('end_date')
                            ->label('Tanggal Selesai')
                            ->required()
                            ->placeholder('Silahkan pilih tanggal berakhir'),

                        Forms\Components\DatePicker::make('registration_start_date')
                            ->label('Tanggal Mulai Pendaftaran')
                            ->required()
                            ->default(Carbon::today()), // Mengatur default ke tanggal hari ini

                        Forms\Components\DatePicker::make('registration_end_date')
                            ->label('Tanggal Akhir Pendaftaran')
                            ->required()
                            ->placeholder('Pilih Tanggal Akhir'),

                        Forms\Components\Select::make('company_id')
                            ->relationship('company', 'company_name')
                            ->label('Perusahaan')
                            ->required()
                            ->default(auth()->user()->company_id), // Mengatur default ke perusahaan user

                        Forms\Components\Select::make('training_type_id')
                            ->relationship('trainingType', 'trainer_type_name')
                            ->label('Tipe Pelatihan')
                            ->required(),

                        Forms\Components\TextInput::make('training_location')
                            ->label('Lokasi Pelatihan')
                            ->placeholder('Masukkan lokasi pelatihan'),

                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'active' => 'Aktif',
                                'inactive' => 'Tidak Aktif',
                            ])
                            ->default('active'),

                        Forms\Components\FileUpload::make('photo')
                            ->label('Unggah Foto')
                            ->required()
                            ->disk('public')
                            ->directory('training_photos')
                            ->preserveFilenames(),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Pelatihan'),
                Tables\Columns\TextColumn::make('company.company_name')
                    ->label('Perusahaan'),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Tanggal Mulai'),
                Tables\Columns\TextColumn::make('end_date')
                    ->label('Tanggal Selesai'),
            ])
            ->filters([
                // Tambahkan filter sesuai kebutuhan
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    // Menambahkan batasan akses berdasarkan `company_id` pengguna login
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', auth()->user()->id); // Mengambil pelatihan berdasarkan user_id
    }
    public static function getRelations(): array
    {
        return [
            // Tambahkan relasi jika diperlukan
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrainings::route('/'),
            'create' => Pages\CreateTraining::route('/create'),
            'edit' => Pages\EditTraining::route('/{record}/edit'),
        ];
    }
}