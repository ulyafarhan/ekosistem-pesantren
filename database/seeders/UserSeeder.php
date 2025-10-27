<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        // Admin Utama
        User::create([
            'name' => 'Admin Pesantren',
            'email' => 'admin@pesantren.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'), 
        ]);

        // Contoh Pengguna Biasa
        User::create([
            'name' => 'Ahmad Santri',
            'email' => 'ahmad.santri@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('santri123'),
        ]);

        User::create([
            'name' => 'Fatimah Santriwati',
            'email' => 'fatimah.santriwati@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('santriwati123'),
        ]);

        $this->command->info('Seeder User berhasil dijalankan. Dibuat 3 pengguna (1 admin, 2 pengguna biasa).');
    }
}