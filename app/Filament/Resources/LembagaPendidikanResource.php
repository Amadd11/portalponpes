<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LembagaPendidikanResource\Pages;
use App\Models\LembagaPendidikan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LembagaPendidikanResource extends Resource
{
    protected static ?string $model = LembagaPendidikan::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'Profil';

    protected static ?string $navigationLabel = 'Lembaga Pendidikan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(3)
                    ->schema([
                        // Kolom utama untuk detail
                        Forms\Components\Section::make('Detail Lembaga')
                            ->schema([
                                Forms\Components\TextInput::make('nama_lembaga')
                                    ->label('Nama Lembaga')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('deskripsi')
                                    ->label('Deskripsi Singkat')
                                    ->helperText('Contoh: Setingkat Sekolah Dasar (SD)')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->columnSpan(2),

                        // Kolom samping untuk logo
                        Forms\Components\Section::make('Media')
                            ->schema([
                                Forms\Components\FileUpload::make('logo')
                                    ->label('Logo Lembaga')
                                    ->image()
                                    ->directory('logo-lembaga-pendidikan')
                                    ->required()
                                    ->imageEditor()
                                    ->avatar(),
                            ])
                            ->columnSpan(1),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo')
                    ->circular(),
                Tables\Columns\TextColumn::make('nama_lembaga')
                    ->label('Nama Lembaga')
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->searchable()
                    ->limit(50)
                    ->tooltip(fn(string $state): string => $state),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime()
                    ->sortable()
                    ->since(),
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
            'index' => Pages\ListLembagaPendidikans::route('/'),
            'create' => Pages\CreateLembagaPendidikan::route('/create'),
            'edit' => Pages\EditLembagaPendidikan::route('/{record}/edit'),
        ];
    }
}
