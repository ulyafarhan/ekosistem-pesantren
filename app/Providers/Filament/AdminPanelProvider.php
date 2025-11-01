<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\BeritaTerbaru;
use App\Filament\Widgets\BeritaChart;
use Filament\Navigation\NavigationGroup;
use Illuminate\Support\HtmlString;


class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandLogo(fn () => new HtmlString('
                <div class="flex items-center gap-x-3">
                    <img src="' . asset('img/logo.png') . '" alt="Logo" class="h-10 w-10 object-contain dark:invert">
                    <span class="text-xl font-bold text-gray-900 dark:text-white">
                        Pesantren Pusat
                    </span>
                </div>
            '))
            ->favicon(asset('img/logo.png')) // 2. Tambahkan Favicon
            ->sidebarCollapsibleOnDesktop(false) // 3. Membuat brandName selalu terlihat
            ->colors([
                'primary' => Color::Blue,
                'secondary' => Color::Amber, // 4. Tambahkan warna sekunder (Amber/Emas)
                'success' => Color::Green,
                'danger' => Color::Red,
            ])
            ->navigationGroups([ // 5. Definisikan grup navigasi
                NavigationGroup::make()
                    ->label('Manajemen Konten'),
                NavigationGroup::make()
                    ->label('Sejarah & Struktur'),
                NavigationGroup::make()
                    ->label('Akademik & Pendaftaran'),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                StatsOverview::class,
                BeritaTerbaru::class,
                BeritaChart::class,
                Widgets\AccountWidget::class, // Menambahkan kembali widget akun
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
