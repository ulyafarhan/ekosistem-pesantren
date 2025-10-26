<?php

namespace App\Providers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Pengurus;
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
        Pengurus::observe(ImageProcessingObserver::class);
        TokohSejarah::observe(ImageProcessingObserver::class);
        Berita::observe(ImageProcessingObserver::class);
        Galeri::observe(ImageProcessingObserver::class);
    }
}
