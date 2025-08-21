<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Pengumuman;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Storage;
use App\Filament\Resources\PengumumanResource\Pages;

class PengumumanResource extends Resource
{
    protected static ?string $model = Pengumuman::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell-alert';

    protected static ?string $navigationLabel = 'Pengumuman';

    protected static ?string $modelLabel = 'Pengumuman';

    protected static ?string $pluralModelLabel = 'Pengumuman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(3)
                    ->schema([
                        // Kolom utama untuk detail
                        Forms\Components\Section::make('Detail Pengumuman')
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
                                Forms\Components\RichEditor::make('deskripsi')
                                    ->label('Deskripsi Pengumuman')
                                    ->columnSpanFull(),
                            ])
                            ->columnSpan(2),

                        // Kolom samping untuk gambar
                        Forms\Components\Section::make('Media')
                            ->schema([
                                Forms\Components\FileUpload::make('gambar_url')
                                    ->label('Gambar Pengumuman')
                                    ->image()
                                    ->directory('pengumuman-attachments')
                                    ->required()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        '4:3',
                                    ])
                                    ->hint('Hanya Ukuran Gambar 4:3 (400x300)px.'),

                            ])
                            ->columnSpan(1),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar_url')
                    ->label('Gambar')
                    ->square()
                    ->height(80),
                Tables\Columns\TextColumn::make('judul')
                    ->searchable()
                    ->sortable()
                    ->wrap(),
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
            'index' => Pages\ListPengumumen::route('/'), // Perbaikan: 'ListPengumumen' menjadi 'ListPengumumans'
            'create' => Pages\CreatePengumuman::route('/create'),
            'edit' => Pages\EditPengumuman::route('/{record}/edit'),
        ];
    }
}
