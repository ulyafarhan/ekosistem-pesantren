<?php

namespace App\Filament\Resources\ProgramDanFasilitasResource\Pages;

use App\Filament\Resources\ProgramDanFasilitasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProgramDanFasilitas extends ListRecords
{
    protected static string $resource = ProgramDanFasilitasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
