<?php

namespace App\Filament\Resources\GaleriResource\Pages;

use App\Filament\Resources\GaleriResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

// Pastikan nama class di sini adalah CreateGaleris
class CreateGaleri extends CreateRecord
{
    protected static string $resource = GaleriResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if ($data['tipe'] === 'foto') {
            $data['file_media'] = $data['photo_upload'];
        } else {
            $data['file_media'] = $data['video_url'];
        }

        return $data;
    }
}