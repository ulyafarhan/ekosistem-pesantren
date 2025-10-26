<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\PeriodePendaftaran;
use App\Models\KontakPanitia;

class PeriodePendaftaranSeeder extends Seeder
{
    public function run(): void
    {
        $periodeAktif = PeriodePendaftaran::create([
            'tahun_ajaran' => '2026/2027',
            'tanggal_mulai' => now()->startOfMonth(),
            'tanggal_selesai' => now()->addMonths(2),
            'status' => true,
        ]);

        KontakPanitia::create([
            'periode_pendaftaran_id' => $periodeAktif->id,
            'nama_panitia' => 'Ustadz Amir (Panitia Putra)',
            'nomor_whatsapp' => '6281234567890',
        ]);
        KontakPanitia::create([
            'periode_pendaftaran_id' => $periodeAktif->id,
            'nama_panitia' => 'Ustadzah Aisyah (Panitia Putri)',
            'nomor_whatsapp' => '6281234567891',
        ]);

        PeriodePendaftaran::create([
            'tahun_ajaran' => '2025/2026',
            'tanggal_mulai' => now()->subYear(),
            'tanggal_selesai' => now()->subYear()->addMonths(2),
            'status' => false,
        ]);
    }
}