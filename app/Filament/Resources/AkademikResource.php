<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AkademikResource\Pages;
use App\Models\Akademik;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class AkademikResource extends Resource
{
    protected static ?string $model = Akademik::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationLabel = 'Akademik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('deskripsi')
                    ->label('Deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Section::make('Dokumen Akademik')
                    ->description('Unggah dokumen-dokumen pendukung akademik.')
                    ->schema([
                        Forms\Components\FileUpload::make('kurikulum')
                            ->label('Kurikulum (PDF)')
                            ->directory('akademik/kurikulum')
                            ->preserveFilenames()
                            ->downloadable()
                            ->openable()
                            ->nullable() // Ditambahkan untuk mengizinkan penghapusan file
                            ->acceptedFileTypes(['application/pdf']),

                        Forms\Components\FileUpload::make('kalender_akademik')
                            ->label('Kalender Akademik (PDF/Gambar)')
                            ->directory('akademik/kalender')
                            ->preserveFilenames()
                            ->downloadable()
                            ->openable()
                            ->nullable() // Ditambahkan untuk mengizinkan penghapusan file
                            ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png', 'image/webp']),

                        Forms\Components\FileUpload::make('peraturan_akademik')
                            ->label('Peraturan Akademik (PDF)')
                            ->directory('akademik/peraturan')
                            ->preserveFilenames()
                            ->downloadable()
                            ->openable()
                            ->nullable() // Ditambahkan untuk mengizinkan penghapusan file
                            ->acceptedFileTypes(['application/pdf']),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Ringkasan Deskripsi')
                    ->searchable()
                    ->wrap()
                    ->limit(100)
                    ->formatStateUsing(fn($state) => strip_tags($state))
                    ->tooltip(fn($state) => strip_tags($state)),

                Tables\Columns\TextColumn::make('kurikulum')
                    ->label('Kurikulum')
                    ->formatStateUsing(fn(?string $state): string => $state ? 'Tersedia' : 'Tidak Ada')
                    ->badge()
                    ->color(fn(?string $state): string => $state ? 'success' : 'gray'),

                Tables\Columns\TextColumn::make('kalender_akademik')
                    ->label('Kalender')
                    ->formatStateUsing(fn(?string $state): string => $state ? 'Tersedia' : 'Tidak Ada')
                    ->badge()
                    ->color(fn(?string $state): string => $state ? 'success' : 'gray'),

                Tables\Columns\TextColumn::make('peraturan_akademik')
                    ->label('Peraturan')
                    ->formatStateUsing(fn(?string $state): string => $state ? 'Tersedia' : 'Tidak Ada')
                    ->badge()
                    ->color(fn(?string $state): string => $state ? 'success' : 'gray'),

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

    public static function canCreate(): bool
    {
        return Akademik::count() === 0;
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
            'index' => Pages\ListAkademiks::route('/'),
            'create' => Pages\CreateAkademik::route('/create'),
            'edit' => Pages\EditAkademik::route('/{record}/edit'),
        ];
    }
}
