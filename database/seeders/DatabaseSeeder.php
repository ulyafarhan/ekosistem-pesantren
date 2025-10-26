<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Artisan::call('storage:clear-uploads');
        
        User::factory()->create([
            'name' => 'Admin Pesantren',
            'email' => 'admin@pesantren.com',
            'password' => bcrypt('admin123'),
        ]);

        $this->call([
            PengurusSeeder::class,
            TokohSejarahSeeder::class,
            BeritaSeeder::class,
            GaleriSeeder::class,
            PeriodePendaftaranSeeder::class,
        ]);
    }
}