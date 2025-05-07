<?php

namespace App\Filament\Resources\InformasiPendaftaranResource\Pages;

use App\Filament\Resources\InformasiPendaftaranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInformasiPendaftaran extends EditRecord
{
    protected static string $resource = InformasiPendaftaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
