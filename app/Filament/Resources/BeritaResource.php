<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Berita;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BeritaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BeritaResource\RelationManagers;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Artikel/Kajian';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'nama_category')
                    ->required(),
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->lazy()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->disabled(),
                Forms\Components\FileUpload::make('thumbnail')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->image()
                    ->directory('berita-thumbnails')
                    ->required(),
                Forms\Components\RichEditor::make('isi')
                    ->disableToolbarButtons([
                        'blockquote', // atau tombol lain yang kamu tidak perlukan
                    ])
                    ->extraInputAttributes([
                        'style' => 'text-indent: 0; margin: 0;',
                    ])->columnSpanFull(),
                Forms\Components\FileUpload::make('attachments')
                    ->label('Lampiran PDF')
                    ->disk('public')
                    ->directory('berita-attachments')
                    ->acceptedFileTypes(['application/pdf'])
                    ->openable() // Bisa dibuka langsung jika PDF
                    ->downloadable() // Aktifkan tombol download di CMS jika perlu
                    ->multiple()
                    ->reorderable(),
                Forms\Components\DateTimePicker::make('tanggal_publish'),
                Forms\Components\Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'publish' => 'Publish',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.nama_category')
                    ->sortable(),
                Tables\Columns\TextColumn::make('judul')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Thumbnail'),
                Tables\Columns\TextColumn::make('tanggal_publish')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
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
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'publish' => 'Publish',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
