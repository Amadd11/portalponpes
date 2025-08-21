<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\ProgramUnggulan;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProgramUnggulanResource\Pages;

class ProgramUnggulanResource extends Resource
{
    protected static ?string $model = ProgramUnggulan::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    protected static ?string $navigationLabel = 'Program Unggulan';

    protected static ?string $navigationGroup = 'Profil';

    protected static ?string $modelLabel = 'Program Unggulan';

    protected static ?string $pluralModelLabel = 'Program Unggulan';

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
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                                Forms\Components\TextInput::make('slug')
                                    ->hidden()
                                    ->required()
                                    ->disabled()
                                    ->dehydrated(),
                                Forms\Components\Textarea::make('deskripsi')
                                    ->label('Deskripsi Singkat')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                                Forms\Components\RichEditor::make('deskripsi_panjang')
                                    ->label('Deskripsi Panjang (Detail)')
                                    ->columnSpanFull(),
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
                                    ->acceptedFileTypes(['image/png'])
                                    ->hint('Hanya file PNG yang diperbolehkan.')
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
