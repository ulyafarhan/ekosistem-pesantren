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
                
                $fileValue = $model->{$field};
                $filePath = is_array($fileValue) ? $fileValue[0] : $fileValue;

                if (empty($filePath)) {
                    continue;
                }

                if (Storage::disk('public')->exists($filePath) && !Str::startsWith($filePath, 'http')) {
                    $this->processImage($filePath);
                }
            }
        }
    }

    protected function processImage(string $filePath): void
    {
        $fullPath = Storage::disk('public')->path($filePath);

        try {
            $optimizerChain = OptimizerChainFactory::create();
            $optimizerChain->optimize($fullPath);
        } catch (\Exception $e) {
            report($e);
            return;
        }
    }
}