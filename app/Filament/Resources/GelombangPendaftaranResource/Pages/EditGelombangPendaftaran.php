<?php

namespace App\Filament\Resources\GelombangPendaftaranResource\Pages;

use App\Filament\Resources\GelombangPendaftaranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGelombangPendaftaran extends EditRecord
{
    protected static string $resource = GelombangPendaftaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
