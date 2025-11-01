<?php

namespace App\Filament\Widgets;

use App\Models\Berita;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class BeritaChart extends ChartWidget
{
    protected static ?string $heading = 'Statistik Posting Berita (30 Hari Terakhir)';

    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 4;
    
    protected function getData(): array
    {
        $data = Trend::model(Berita::class)
            ->between(
                start: now()->subMonth(),
                end: now(),
            )
            ->perDay()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Berita Dibuat',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'borderColor' => 'rgb(37, 99, 235)',
                    'backgroundColor' => 'rgba(37, 99, 235, 0.2)',
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}