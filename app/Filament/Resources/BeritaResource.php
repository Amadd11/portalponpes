<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Models\Berita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Artikel/Kajian';

    protected static ?string $navigationGroup = 'Artikel';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->columns(3)
                    ->schema([
                        // Kolom Utama untuk Konten
                        Forms\Components\Section::make('Konten Artikel')
                            ->schema([
                                Forms\Components\TextInput::make('judul')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),

                                Forms\Components\TextInput::make('slug')
                                    ->hidden()
                                    ->required()
                                    ->disabled()
                                    ->dehydrated()
                                    ->maxLength(255),

                                Forms\Components\RichEditor::make('isi')
                                    ->required()
                                    ->columnSpanFull()
                                    ->disableToolbarButtons(['blockquote']),
                            ])
                            ->columnSpan(2),

                        // Kolom Samping untuk Metadata
                        Forms\Components\Section::make('Metadata')
                            ->schema([
                                Forms\Components\Select::make('category_id')
                                    ->label('Kategori')
                                    ->relationship('category', 'nama_category')
                                    ->searchable()
                                    ->required(),

                                Forms\Components\FileUpload::make('thumbnail')
                                    ->label('Thumbnail')
                                    ->image()
                                    ->directory('berita-thumbnails')
                                    ->required(),

                                Forms\Components\DateTimePicker::make('tanggal_publish')
                                    ->label('Tanggal Publish')
                                    ->default(now()),

                                Forms\Components\Select::make('status')
                                    ->options([
                                        'draft' => 'Draft',
                                        'publish' => 'Publish',
                                    ])
                                    ->required()
                                    ->default('draft'),

                                Forms\Components\FileUpload::make('attachments')
                                    ->label('Lampiran PDF (Opsional)')
                                    ->directory('berita-attachments')
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->reorderable()
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
                Tables\Columns\TextColumn::make('judul')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Thumbnail'),
                Tables\Columns\TextColumn::make('category.nama_category')
                    ->label('Kategori')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'draft' => 'gray',
                        'publish' => 'success',
                    }),
                Tables\Columns\TextColumn::make('tanggal_publish')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime()
                    ->sortable()
                    ->since()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'publish' => 'Publish',
                    ]),
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
