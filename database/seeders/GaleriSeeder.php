<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri; 
use Illuminate\Support\Str;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        $galeris = [
            ['judul' => 'Suasana Khidmat Wisuda Akbar Santri Angkatan ke-25', 'tipe' => 'foto'],
            ['judul' => 'Kunjungan Studi Banding dari Pesantren Darussalam Gontor', 'tipe' => 'foto'],
            ['judul' => 'Momen Kebersamaan Santri saat Kegiatan Lomba 17 Agustus', 'tipe' => 'foto'],
            ['judul' => 'Video Profil Pesantren Pusat 2025', 'tipe' => 'video', 'file_media' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'],
            ['judul' => 'Praktikum di Laboratorium Sains Terpadu', 'tipe' => 'foto'],
            ['judul' => 'Liputan Media Nasional tentang Prestasi Riset Santri', 'tipe' => 'video', 'file_media' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'],
            ['judul' => 'Kegiatan Ekstrakurikuler Panahan dan Berkuda', 'tipe' => 'foto'],
            ['judul' => 'Pawai Obor Menyambut Tahun Baru Islam 1447 H', 'tipe' => 'foto'],
            ['judul' => 'Dokumentasi Program Santri Mengabdi di Pedalaman Kalimantan', 'tipe' => 'foto'],
            ['judul' => 'Ceramah Umum oleh Syaikh dari Al-Azhar, Kairo', 'tipe' => 'video', 'file_media' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'],
            ['judul' => 'Pentas Seni Santri: Dari Nasyid hingga Teater Islami', 'tipe' => 'foto'],
            ['judul' => 'Gotong Royong Membersihkan Lingkungan Pesantren', 'tipe' => 'foto'],
            ['judul' => 'Suasana Ceria di Asrama Santriwati', 'tipe' => 'foto'],
            ['judul' => 'Tutorial Kaligrafi oleh Juara Kaligrafi Internasional', 'tipe' => 'video', 'file_media' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'],
            ['judul' => 'Momen Haru Pelepasan Santri untuk Program Beasiswa ke Luar Negeri', 'tipe' => 'foto'],
        ];

        foreach ($galeris as $item) {
            Galeri::create([
                'judul' => $item['judul'],
                'deskripsi' => 'Dokumentasi resmi kegiatan Pesantren Pusat. Momen-momen ini menangkap semangat kebersamaan, keilmuan, dan pengabdian yang menjadi pilar utama pendidikan kami.',
                'tipe' => $item['tipe'],
                'file_media' => $item['file_media'] ?? 'https://picsum.photos/seed/' . Str::slug($item['judul']) . '/800/600',
            ]);
        }
    }
}