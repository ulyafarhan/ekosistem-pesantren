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
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;

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

        View::composer('layouts.header', function ($view) {
            $view->with('isHome', Request::routeIs('homepage'));
            $view->with('isProgram', Request::routeIs('program.index'));
            $view->with('isBerita', Request::routeIs('berita.*'));
            $view->with('isGaleri', Request::routeIs('galeri.index'));
            
            $isTentang = Request::routeIs([
                'pengurus.index', 
                'tokoh.sejarah.index', 
                'sejarah.show'
            ]);
            $view->with('isTentang', $isTentang);
        });
    }
}
