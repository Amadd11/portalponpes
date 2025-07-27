<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramUnggulanResource\Pages;
use App\Models\ProgramUnggulan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProgramUnggulanResource extends Resource
{
    protected static ?string $model = ProgramUnggulan::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    protected static ?string $navigationLabel = 'Program Unggulan';

    protected static ?string $navigationGroup = 'Profil';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(3)
                    ->schema([
                        // Kolom utama untuk detail
                        Forms\Components\Section::make('Detail Program')
                            ->schema([
                                Forms\Components\TextInput::make('nama_program')
                                    ->label('Nama Program')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('deskripsi')
                                    ->label('Deskripsi')
                                    ->rows(5)
                                    ->maxLength(255)
                                    ->required(),
                            ])
                            ->columnSpan(2),

                        // Kolom samping untuk logo
                        Forms\Components\Section::make('Media')
                            ->schema([
                                Forms\Components\FileUpload::make('logo')
                                    ->label('Logo Program')
                                    ->image()
                                    ->directory('logo-program-unggulan')
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
                Tables\Columns\TextColumn::make('nama_program')
                    ->label('Nama Program')
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
            'index' => Pages\ListProgramUnggulans::route('/'),
            'create' => Pages\CreateProgramUnggulan::route('/create'),
            'edit' => Pages\EditProgramUnggulan::route('/{record}/edit'),
        ];
    }
}
