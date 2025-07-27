<?php

namespace App\Filament\Resources\LembagaPendidikanResource\Pages;

use App\Filament\Resources\LembagaPendidikanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLembagaPendidikans extends ListRecords
{
    protected static string $resource = LembagaPendidikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
