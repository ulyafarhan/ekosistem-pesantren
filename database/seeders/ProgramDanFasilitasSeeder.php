<?php

namespace Database\Seeders;

use App\Models\ProgramDanFasilitas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramDanFasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProgramDanFasilitas::create([
            'program_pendidikan' => '<h1>Program Pendidikan Unggulan</h1><p>Kami menawarkan kurikulum yang mengintegrasikan pendidikan agama dan umum, dengan program unggulan Tahfidz Al-Quran dan kelas bilingual.</p>',
            'fasilitas' => '<h1>Fasilitas Modern</h1><p>Pesantren dilengkapi dengan asrama yang nyaman, laboratorium komputer, perpustakaan, dan lapangan olahraga yang representatif.</p>',
        ]);
    }
}