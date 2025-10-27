<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Artisan::call('storage:clear-uploads');

        $this->call([
            UserSeeder::class, // Menangani semua pembuatan user
            PengurusSeeder::class,
            TokohSejarahSeeder::class,
            BeritaSeeder::class,
            GaleriSeeder::class,
            PeriodePendaftaranSeeder::class,
            BrosurSeeder::class, // Seeder baru untuk Brosur
            ProgramDanFasilitasSeeder::class,
            SejarahUnitPendidikanSeeder::class,
            KontakPanitiaSeeder::class, // Memastikan seeder ini juga dipanggil
        ]);
    }
}