<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Akademik;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AkademikResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AkademikResource\RelationManagers;

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
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('kurikulum')
                    ->label('Kurikulum')
                    ->acceptedFileTypes(['application/pdf'])
                    ->directory('kurikulum')
                    ->preserveFilenames()  // folder penyimpanan di storage/app/public/lampiran
                    ->downloadable()
                    ->openable(),
                Forms\Components\FileUpload::make('kalender_akademik')
                    ->required()
                    ->acceptedFileTypes([
                        'application/pdf',
                        'image/jpeg',
                        'image/png',
                        'image/webp',
                    ])
                    ->directory('kalender-akademik')
                    ->preserveFilenames()  // folder penyimpanan di storage/app/public/lampiran
                    ->downloadable()
                    ->openable(),
                Forms\Components\FileUpload::make('peraturan_akademik')
                    ->required()
                    ->acceptedFileTypes(['application/pdf'])
                    ->directory('peraturan-akademik')
                    ->preserveFilenames()  // folder penyimpanan di storage/app/public/lampiran
                    ->downloadable()
                    ->openable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('deskripsi')
                    ->formatStateUsing(fn($state) => Str::limit(strip_tags($state), 100))
                    ->tooltip(fn($state) => strip_tags($state))
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('kurikulum')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kalender_akademik')
                    ->searchable(),
                Tables\Columns\TextColumn::make('peraturan_akademik')
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
            'index' => Pages\ListAkademiks::route('/'),
            'create' => Pages\CreateAkademik::route('/create'),
            'edit' => Pages\EditAkademik::route('/{record}/edit'),
        ];
    }
}
