<?php

namespace App\Filament\Resources\GaleriResource\Pages;

use App\Filament\Resources\GaleriResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

// Menggunakan nama class asli: EditGaleri
class EditGaleri extends EditRecord
{
    protected static string $resource = GaleriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    // Menambahkan logika untuk memproses data sebelum disimpan
    protected function mutateFormDataBeforeSave(array $data): array
    {
        if ($data['tipe'] === 'foto' && isset($data['photo_upload'])) {
            $data['file_media'] = $data['photo_upload'];
        } elseif ($data['tipe'] === 'video' && isset($data['video_url'])) {
            $data['file_media'] = $data['video_url'];
        }

        return $data;
    }
}