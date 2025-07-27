<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GelombangPendaftaranResource\Pages;
use App\Filament\Resources\GelombangPendaftaranResource\RelationManagers;
use App\Models\GelombangPendaftaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GelombangPendaftaranResource extends Resource
{
    protected static ?string $model = GelombangPendaftaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Pendaftaran';

    protected static ?string $navigationLabel = 'Gelombang Pendaftaran';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Detail Gelombang')
                    ->schema([
                        Forms\Components\TextInput::make('nama_gelombang')
                            ->label('Nama Gelombang')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\DatePicker::make('tanggal_mulai')
                            ->required(),
                        Forms\Components\DatePicker::make('tanggal_selesai')
                            ->required()
                            ->after('tanggal_mulai'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_gelombang')
                    ->label('Nama Gelombang')
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->date('d M Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_selesai')
                    ->date('d M Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('is_active')
                    ->label('Status')
                    ->badge()
                    ->label('Status')
                    ->formatStateUsing(fn(bool $state) => $state ? 'Aktif' : 'Tidak Aktif')
                    ->color(fn(bool $state) => $state ? 'success' : 'danger'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('tampilkan')
                    ->label('Tampilkan')
                    ->icon('heroicon-o-eye')
                    ->color('success')
                    ->visible(fn($record) => !$record->is_active)
                    ->action(function ($record) {
                        // Nonaktifkan semua
                        GelombangPendaftaran::where('is_active', true)
                            ->update(['is_active' => false]);

                        // Aktifkan record ini
                        $record->update(['is_active' => true]);
                    })
                    ->requiresConfirmation()
                    ->modalHeading('Tampilkan Gelombang Ini?'),
                Tables\Actions\Action::make('nonaktifkan')
                    ->label('Nonaktifkan')
                    ->icon('heroicon-o-eye-slash')
                    ->color('danger')
                    ->visible(fn($record) => $record->is_active)
                    ->action(function ($record) {
                        $record->update(['is_active' => false]);
                    })
                    ->requiresConfirmation()
                    ->modalHeading('Nonaktifkan Gelombang Ini?'),
                Tables\Actions\EditAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListGelombangPendaftarans::route('/'),
            'create' => Pages\CreateGelombangPendaftaran::route('/create'),
            'edit' => Pages\EditGelombangPendaftaran::route('/{record}/edit'),
        ];
    }
}
