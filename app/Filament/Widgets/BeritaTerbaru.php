<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\BeritaResource;
use App\Models\Berita;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class BeritaTerbaru extends BaseWidget
{
    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 4;

    protected function getTableHeading(): string
    {
        return 'Berita Terbaru';
    }

    public function getTableQuery(): Builder
    {
        return Berita::query()->latest()->limit(5);
    }

    protected function getTableColumns(): array
    {
        return [
            ImageColumn::make('gambar_utama')
                ->label('Gambar')
                ->square(),

            TextColumn::make('judul')
                ->searchable()
                ->sortable()
                ->limit(60)
                ->tooltip(fn (Berita $record): string => $record->judul),
            
            BadgeColumn::make('is_active')
                ->label('Status')
                ->colors([
                    'success' => true,
                    'danger' => false,
                ])
                ->formatStateUsing(fn (bool $state) => $state ? 'Published' : 'Draft')
                ->sortable(),

            TextColumn::make('created_at')
                ->label('Dibuat Pada')
                ->date('d M Y')
                ->sortable(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('Lihat')
                ->url(fn (Berita $record): string => BeritaResource::getUrl('edit', ['record' => $record]))
                ->icon('heroicon-o-arrow-top-right-on-square'),
        ];
    }
}