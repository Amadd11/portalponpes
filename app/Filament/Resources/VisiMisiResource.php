<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisiMisiResource\Pages;
use App\Filament\Resources\VisiMisiResource\RelationManagers;
use App\Models\VisiMisi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VisiMisiResource extends Resource
{
    protected static ?string $model = VisiMisi::class;

    protected static ?string $navigationIcon = 'heroicon-o-flag';

    protected static ?string $navigationLabel = 'Visi & Misi';

    protected static ?string $navigationGroup = 'Profil';

    protected static ?string $modelLabel = 'Visi & Misi';
    protected static ?string $pluralModelLabel = 'Visi & Misi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('visi')
                    ->label('Visi')
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('misi')
                    ->label('Misi')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('visi')
                    ->label('Visi')
                    ->limit(100)
                    ->wrap()
                    ->formatStateUsing(fn(string $state): string => strip_tags($state))
                    ->searchable(), // Tambahkan fitur pencarian untuk kolom ini
                Tables\Columns\TextColumn::make('misi')
                    ->label('Misi')
                    ->wrap()
                    ->limit(100)
                    ->searchable()
                    ->formatStateUsing(fn(string $state): string => strip_tags($state)),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime()
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false), // Tampilkan secara default
            ])
            ->filters([
                //
            ])
            ->actions([
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

    public static function canCreate(): bool
    {
        return VisiMisi::count() === 0;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVisiMisis::route('/'),
            'create' => Pages\CreateVisiMisi::route('/create'),
            'edit' => Pages\EditVisiMisi::route('/{record}/edit'),
        ];
    }
}
