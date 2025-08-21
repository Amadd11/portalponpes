<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use App\Models\LembagaPendidikan;
use Illuminate\Database\Eloquent\Builder;
use RelationManagers\CabangsRelationManager;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LembagaPendidikanResource\Pages;
use App\Filament\Resources\LembagaPendidikanResource\RelationManagers\CabangsRelationManager as RelationManagersCabangsRelationManager;

class LembagaPendidikanResource extends Resource
{
    protected static ?string $model = LembagaPendidikan::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'Profil';

    protected static ?string $navigationLabel = 'Lembaga Pendidikan';

    protected static ?string $modelLabel = 'Lembaga Pendidikan';

    protected static ?string $pluralModelLabel = 'Lembaga Pendidikan';

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
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('slug')
                                    ->hidden()
                                    ->required()
                                    ->disabled()
                                    ->dehydrated()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('deskripsi')
                                    ->label('Deskripsi Singkat')
                                    ->helperText('Contoh: Setingkat Sekolah Dasar (SD)')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\RichEditor::make('deskripsi_panjang')
                                    ->label('Deskripsi Panjang (Detail)')
                                    ->columnSpanFull(),
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
                                    ->avatar()
                                    ->acceptedFileTypes(['image/png'])
                                    ->hint('Hanya file PNG yang diperbolehkan.'),
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
            RelationManagersCabangsRelationManager::class, // <-- Tambahkan ini
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
