<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ManagesFileUploads
{
    public static function bootManagesFileUploads(): void
    {
        static::updating(function (Model $model) {
            $dirtyFields = $model->getDirty();
            $fileFields = $model->getFileFields();

            foreach ($fileFields as $field) {
                if (array_key_exists($field, $dirtyFields) && $model->getOriginal($field)) {
                    Storage::disk('public')->delete($model->getOriginal($field));
                }
            }
        });

        static::deleting(function (Model $model) {
            $fileFields = $model->getFileFields();

            foreach ($fileFields as $field) {
                if ($model->{$field}) {
                    // Cek jika ini bukan URL eksternal sebelum menghapus
                    if (!Str::startsWith($model->{$field}, 'http')) {
                        Storage::disk('public')->delete($model->{$field});
                    }
                }
            }
        });
    }

    public function getFileFields(): array
    {
        return $this->fileFields ?? [];
    }
}