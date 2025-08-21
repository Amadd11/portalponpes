<?php

namespace App\Filament\Resources\LembagaPendidikanResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class CabangsRelationManager extends RelationManager
{
    protected static string $relationship = 'cabangs';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('slug')
                    ->hidden()
                    ->required()
                    ->disabled()
                    ->dehydrated(),
                Forms\Components\TextInput::make('deskripsi_singkat')
                    ->maxLength(255),
                Forms\Components\RichEditor::make('konten_lengkap')
                    ->columnSpanFull(),
                Forms\Components\Section::make('Media')
                    ->schema([
                        Forms\Components\FileUpload::make('logo')
                            ->label('Logo Lembaga')
                            ->image()
                            ->directory('logo-cabang')
                            ->required()
                            ->imageEditor()
                            ->avatar()
                            ->acceptedFileTypes(['image/png'])
                            ->hint('Hanya file PNG yang diperbolehkan.'),
                    ])
                    ->columnSpan(1),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama')
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('deskripsi_singkat')->limit(50),
                Tables\Columns\TextColumn::make('konten_lengkap')
                    ->label('Deskripsi')
                    ->searchable()
                    ->limit(100)
                    ->tooltip(fn(?string $state): string => $state ?? '-'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}
