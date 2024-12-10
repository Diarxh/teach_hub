<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;
    protected static ?string $navigationGroup = 'Management';
    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('company_name')
                    ->required()
                    ->label('Nama Perusahaan'),
                Forms\Components\TextInput::make('address')
                    ->label('Alamat'),
                Forms\Components\TextInput::make('phone_number')
                    ->label('No. Telepon'),
                Forms\Components\TextInput::make('email')
                    ->email(),
                Forms\Components\FileUpload::make('logo')
                    ->directory('company-logos'),
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi'),
                // Hidden field untuk user_id
                Forms\Components\Hidden::make('user_id')
                    ->default(fn() => auth()->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company_name')
                    ->label('Nama Perusahaan'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone_number')
                    ->label('No. Telepon'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }

    // Tambahan untuk filter data berdasarkan user
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (auth()->user()->hasRole('perusahaan')) {
            $query->where('user_id', auth()->id());
        }

        return $query;
    }

    // Badge notifikasi jika belum mengisi data
    public static function getNavigationBadge(): ?string
    {
        if (auth()->user()->hasRole('perusahaan') && !auth()->user()->company) {
            return 'Lengkapi Data';
        }
        return null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return auth()->user()->company ? null : 'warning';
    }
}