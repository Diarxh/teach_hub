<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrainingTypeResource\Pages;
use App\Filament\Resources\TrainingTypeResource\RelationManagers;
use App\Models\TrainingType;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrainingTypeResource extends Resource
{
    protected static ?string $model = TrainingType::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'Management';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Card::make()  // Menggunakan Card untuk kelompokkan elemen
                ->schema([
                    Forms\Components\Grid::make(2)  // Mengatur grid dengan 2 kolom
                        ->schema([
                            Forms\Components\TextInput::make('trainer_type_name')
                                ->required()
                                ->label('Nama Tipe Pelatih')
                                ->placeholder('Masukkan nama tipe pelatih')
                                ->rules('string|max:255'),
                            Forms\Components\Textarea::make('trainer_type_description')
                                ->label('Deskripsi Tipe Pelatih')
                                ->placeholder('Masukkan deskripsi tipe pelatih')
                                ->rules('string|max:500'),
                        ]),
                    Forms\Components\FileUpload::make('photo')
                        ->label('Foto Tipe Pelatih')
                        ->placeholder('Unggah foto tipe pelatih')
                        ->image()
                        ->required()
                        ->rules('image|max:2048'),
                    Forms\Components\Select::make('status')
                        ->label('Status')
                        ->options([
                            'active' => 'Aktif',
                            'inactive' => 'Tidak Aktif',
                        ])
                        ->default('active'),
                ])
                ->columns(1),  // Mengatur kolom menjadi 1 untuk elemen di bawah
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('trainer_type_name')
                    ->label('Nama Tipe Pelatih')
                    ->sortable()  // Menambahkan kemampuan untuk mengurutkan
                    ->searchable(),  // Menambahkan kemampuan untuk mencari
                Tables\Columns\TextColumn::make('trainer_type_description')
                    ->label('Deskripsi Tipe Pelatih')
                    ->limit(50)  // Membatasi panjang teks yang ditampilkan
                    ->sortable()  // Menambahkan kemampuan untuk mengurutkan
                    ->searchable(),  // Menambahkan kemampuan untuk mencari
                Tables\Columns\ImageColumn::make('photo')
                    ->label('Foto')
                    ->disk('public')
                    ->height(50)
                    ->width(50)
                    ->circular()  // Opsional: membuat gambar menjadi lingkaran
                    ->defaultImageUrl(url('/storage/default.png')),  // Opsional: gambar default jika tidak ada
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Edit'),  // Menambahkan label untuk aksi edit
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->label('Hapus'),  // Menambahkan label untuk aksi hapus
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrainingTypes::route('/'),
            'create' => Pages\CreateTrainingType::route('/create'),
            'edit' => Pages\EditTrainingType::route('/{record}/edit'),
        ];
    }
}