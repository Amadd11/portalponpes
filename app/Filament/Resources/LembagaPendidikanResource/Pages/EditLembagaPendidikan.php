<?php

namespace App\Filament\Resources\LembagaPendidikanResource\Pages;

use App\Filament\Resources\LembagaPendidikanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLembagaPendidikan extends EditRecord
{
    protected static string $resource = LembagaPendidikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
