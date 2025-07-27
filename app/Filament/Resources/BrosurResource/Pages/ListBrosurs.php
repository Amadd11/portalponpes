<?php

namespace App\Filament\Resources\BrosurResource\Pages;

use App\Filament\Resources\BrosurResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBrosurs extends ListRecords
{
    protected static string $resource = BrosurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
