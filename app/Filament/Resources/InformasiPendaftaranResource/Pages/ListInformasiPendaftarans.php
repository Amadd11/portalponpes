<?php

namespace App\Filament\Resources\InformasiPendaftaranResource\Pages;

use App\Filament\Resources\InformasiPendaftaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInformasiPendaftarans extends ListRecords
{
    protected static string $resource = InformasiPendaftaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
