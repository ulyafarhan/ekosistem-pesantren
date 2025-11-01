<?php

namespace App\Filament\Widgets;

use App\Models\Berita;
use App\Models\Pengurus;
use App\Models\TokohSejarah;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    
    protected int | string | array $columnSpan = 1;
    protected function getStats(): array
    {
        return [
            Stat::make('Total Berita', Berita::count())
                ->description('Jumlah semua berita')
                ->icon('heroicon-o-newspaper'),
            Stat::make('Jumlah Pengurus', Pengurus::count())
                ->description('Total pengurus terdaftar')
                ->icon('heroicon-o-users'),
            Stat::make('Total Tokoh', TokohSejarah::count())
                ->description('Jumlah Tokoh Sejarah')
                ->icon('heroicon-o-pencil'),
        ];
    }
}