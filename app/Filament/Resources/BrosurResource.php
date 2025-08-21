<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrosurResource\Pages;
use App\Filament\Resources\BrosurResource\RelationManagers;
use App\Models\Brosur;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BrosurResource extends Resource
{
    protected static ?string $model = Brosur::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Brosur';

    protected static ?string $modelLabel = 'Brosur';

    protected static ?string $pluralModelLabel = 'Brosur';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->label('Judul Brosur')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('gambar')
                    ->label('Upload Brosur (Rasio 9:16)')
                    ->required()
                    ->image()
                    ->directory('brosur-thumbnails')
                    ->required()
                    ->hint('Hanya Ukuran 9:16 yang diperbolehkan.')
                    ->imageEditor(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                Tables\Columns\ImageColumn::make('gambar')
                    ->square()
                    ->height(50)
                    ->searchable(),
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListBrosurs::route('/'),
            'create' => Pages\CreateBrosur::route('/create'),
            'edit' => Pages\EditBrosur::route('/{record}/edit'),
        ];
    }
}
