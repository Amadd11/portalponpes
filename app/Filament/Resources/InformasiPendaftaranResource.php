<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use App\Models\InformasiPendaftaran;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\InformasiPendaftaranResource\Pages;
use App\Filament\Resources\InformasiPendaftaranResource\RelationManagers;

class InformasiPendaftaranResource extends Resource
{
    protected static ?string $model = InformasiPendaftaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationLabel = 'Informasi Pendaftaran';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('syarat_pendaftaran')
                    ->label('Syarat Pendaftaran')
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\RichEditor::make('alur_pendaftaran')
                    ->required()
                    ->columnSpanFull()
                    ->label('Alur Pendaftaran'),
                Forms\Components\RichEditor::make('biaya_pendaftaran')
                    ->required()
                    ->columnSpanFull()
                    ->label('Biaya Pendaftaran'),
                Forms\Components\TextInput::make('link_pendaftaran')
                    ->label('Link Pendaftaran')
                    ->url()
                    ->placeholder('https://...')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('brosur_pendaftaran')
                    ->label('Brosur Pendaftaran')
                    ->directory('brosur-pendaftaran') // folder penyimpanan di storage/app/public/lampiran
                    ->downloadable()
                    ->preserveFilenames()
                    ->openable(),
                Forms\Components\FileUpload::make('lampiran')
                    ->label('Lampiran (PDF)')
                    ->acceptedFileTypes(['application/pdf'])
                    ->directory('lampiran') // folder penyimpanan di storage/app/public/lampiran
                    ->preserveFilenames()
                    ->downloadable()
                    ->openable()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('syarat_pendaftaran')
                    ->label('Syarat Pendaftaran')
                    ->formatStateUsing(fn($state) => Str::limit(strip_tags($state), 100))
                    ->tooltip(fn($state) => strip_tags($state))
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('alur_pendaftaran')
                    ->label('Alur Pendaftaran')
                    ->formatStateUsing(fn($state) => Str::limit(strip_tags($state), 100))
                    ->tooltip(fn($state) => strip_tags($state))
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('biaya_pendaftaran')
                    ->label('Biaya Pendaftaran')
                    ->formatStateUsing(fn($state) => Str::limit(strip_tags($state), 100))
                    ->tooltip(fn($state) => strip_tags($state))
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('link_pendaftaran')
                    ->label('Link')
                    ->limit(30)
                    ->url(fn($record) => $record->link_pendaftaran, true)
                    ->searchable(),

                Tables\Columns\TextColumn::make('lampiran')
                    ->label('Lampiran')
                    ->limit(30)
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
    public static function canCreate(): bool
    {
        return InformasiPendaftaran::count() === 0;
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
            'index' => Pages\ListInformasiPendaftarans::route('/'),
            'create' => Pages\CreateInformasiPendaftaran::route('/create'),
            'edit' => Pages\EditInformasiPendaftaran::route('/{record}/edit'),
        ];
    }
}
