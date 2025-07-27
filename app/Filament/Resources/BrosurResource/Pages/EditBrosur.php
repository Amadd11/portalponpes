<?php

namespace App\Filament\Resources\BrosurResource\Pages;

use App\Filament\Resources\BrosurResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBrosur extends EditRecord
{
    protected static string $resource = BrosurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
