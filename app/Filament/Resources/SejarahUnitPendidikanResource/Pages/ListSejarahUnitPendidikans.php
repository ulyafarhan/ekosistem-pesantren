<?php

namespace App\Filament\Resources\SejarahUnitPendidikanResource\Pages;

use App\Filament\Resources\SejarahUnitPendidikanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSejarahUnitPendidikans extends ListRecords
{
    protected static string $resource = SejarahUnitPendidikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
