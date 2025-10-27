<?php

namespace App\Filament\Resources\ProgramDanFasilitasResource\Pages;

use App\Filament\Resources\ProgramDanFasilitasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProgramDanFasilitas extends EditRecord
{
    protected static string $resource = ProgramDanFasilitasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
