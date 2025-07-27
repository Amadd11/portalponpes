<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SejarahResource\Pages;
use App\Models\Sejarah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class SejarahResource extends Resource
{
    protected static ?string $model = Sejarah::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationLabel = 'Sejarah';

    protected static ?string $navigationGroup = 'Profil';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(3)
                    ->schema([
                        // Kolom utama untuk konten
                        Forms\Components\Section::make('Konten Sejarah')
                            ->schema([
                                Forms\Components\FileUpload::make('gambar')
                                    ->label('Gambar Utama')
                                    ->image()
                                    ->directory('sejarah')
                                    ->imageEditor(),
                                Forms\Components\RichEditor::make('isi')
                                    ->label('Isi Sejarah')
                                    ->required()
                                    ->columnSpanFull(),
                            ])
                            ->columnSpan(2),

                        // Kolom samping untuk media
                        Forms\Components\Section::make('Media & Lampiran')
                            ->schema([
                                Forms\Components\FileUpload::make('lampiran')
                                    ->label('Lampiran (PDF)')
                                    ->directory('sejarah-lampiran')
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->openable()
                                    ->downloadable(),
                            ])
                            ->columnSpan(1),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->square()
                    ->height(80),
                Tables\Columns\TextColumn::make('isi')
                    ->label('Ringkasan Isi')
                    ->searchable()
                    ->wrap()
                    ->limit(100)
                    ->formatStateUsing(fn(string $state): string => strip_tags($state)),
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
            'index' => Pages\ListSejarahs::route('/'),
            'create' => Pages\CreateSejarah::route('/create'),
            'edit' => Pages\EditSejarah::route('/{record}/edit'),
        ];
    }
}
