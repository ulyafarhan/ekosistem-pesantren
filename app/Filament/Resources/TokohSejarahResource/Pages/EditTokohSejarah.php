<?php

namespace App\Filament\Resources\TokohSejarahResource\Pages;

use App\Filament\Resources\TokohSejarahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTokohSejarah extends EditRecord
{
    protected static string $resource = TokohSejarahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
