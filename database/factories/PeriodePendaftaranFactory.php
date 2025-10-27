<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PeriodePendaftaranFactory extends Factory
{
    public function definition(): array
    {
        return [
            'tahun_ajaran' => '2025/2026',
            'gelombang' => 1,
            'tanggal_mulai' => now()->subMonth(),
            'tanggal_selesai' => now()->addMonth(),
            'status' => true,
        ];
    }
}