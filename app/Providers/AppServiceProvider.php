<?php

namespace App\Providers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\HeroSlider; 
use App\Models\Pengurus;
use App\Models\ProgramDanFasilitas;
use App\Models\TokohSejarah;
use App\Observers\ImageProcessingObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Berita::observe(ImageProcessingObserver::class);
        Galeri::observe(ImageProcessingObserver::class);
        Pengurus::observe(ImageProcessingObserver::class);
        TokohSejarah::observe(ImageProcessingObserver::class);
        ProgramDanFasilitas::observe(ImageProcessingObserver::class);
        HeroSlider::observe(ImageProcessingObserver::class);
    }
}
