<?php

namespace App\Filament\Resources\ProgramUnggulanResource\Pages;

use App\Filament\Resources\ProgramUnggulanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProgramUnggulan extends EditRecord
{
    protected static string $resource = ProgramUnggulanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
