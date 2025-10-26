<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class ImageProcessingObserver
{
    public function saving(Model $model)
    {
        if (!method_exists($model, 'getFileFields')) {
            return;
        }

        foreach ($model->getFileFields() as $field) {
            if ($model->isDirty($field) && $model->{$field}) {
                $filePath = $model->{$field};
                
                if (Storage::disk('public')->exists($filePath) && !Str::startsWith($filePath, 'http')) {
                    $this->processImage($filePath);
                }
            }
        }
    }

    protected function processImage(string $filePath): void
    {
        // Dapatkan path lengkap dari file di storage
        $fullPath = Storage::disk('public')->path($filePath);

        try {
            // 2. Buat rantai optimizer dan jalankan pada file
            $optimizerChain = OptimizerChainFactory::create();
            $optimizerChain->optimize($fullPath);
        } catch (\Exception $e) {
            // Abaikan jika ada error (misal, tool tidak ditemukan)
            // agar aplikasi tetap berjalan
            report($e);
            return;
        }
    }
}