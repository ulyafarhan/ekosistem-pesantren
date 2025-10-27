<?php

namespace Database\Seeders;

use App\Models\SejarahUnitPendidikan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SejarahUnitPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SejarahUnitPendidikan::create([
            'sejarah_smp' => '<h1>Sejarah Berdirinya SMP</h1><p>Unit SMP didirikan pada tahun 2005 sebagai jawaban atas kebutuhan pendidikan formal yang terintegrasi dengan nilai-nilai pesantren.</p>',
            'sejarah_sma' => '<h1>Sejarah Berdirinya SMA</h1><p>Menyusul kesuksesan unit SMP, unit SMA dibuka pada tahun 2008 untuk menyediakan jenjang pendidikan yang lebih tinggi bagi para santri.</p>',
        ]);
    }
}