<?php

namespace App\Filament\Resources\SejarahUnitPendidikanResource\Pages;

use App\Filament\Resources\SejarahUnitPendidikanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSejarahUnitPendidikan extends EditRecord
{
    protected static string $resource = SejarahUnitPendidikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
