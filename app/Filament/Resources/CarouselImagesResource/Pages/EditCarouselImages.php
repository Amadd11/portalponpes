<?php

namespace App\Filament\Resources\CarouselImagesResource\Pages;

use App\Filament\Resources\CarouselImagesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarouselImages extends EditRecord
{
    protected static string $resource = CarouselImagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
