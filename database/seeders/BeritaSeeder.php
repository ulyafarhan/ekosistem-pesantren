<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $beritas = [
            [
                'judul' => 'Pesantren Pusat Raih Juara Umum di Musabaqah Qira\'atil Kutub Tingkat Nasional 2025',
                'isi_konten' => '<p>Dengan penuh rasa syukur, kontingen Pesantren Pusat berhasil membawa pulang piala Juara Umum dalam ajang bergengsi Musabaqah Qira\'atil Kutub (MQK) Tingkat Nasional yang diselenggarakan di Jakarta. Prestasi ini merupakan buah dari kerja keras, disiplin, dan doa dari seluruh santri, asatidz, dan keluarga besar pesantren. Kemenangan ini didedikasikan untuk para pendiri yang telah menanamkan tradisi keilmuan yang kuat.</p>',
                'status' => 'published',
            ],
            [
                'judul' => 'Kolaborasi Riset Internasional: Santri Kembangkan Aplikasi Deteksi Hadits Dhaif Berbasis AI',
                'isi_konten' => '<p>Sebuah terobosan lahir dari laboratorium riset pesantren. Tim santri senior, bekerja sama dengan peneliti dari Universitas Teknologi Malaysia, berhasil meluncurkan prototipe aplikasi berbasis Kecerdasan Buatan (AI) yang mampu menganalisis sanad dan matan hadits untuk mengidentifikasi potensi kelemahan (dhaif). Proyek ini mendapat apresiasi dari berbagai kalangan akademisi dan ulama.</p>',
                'status' => 'published',
            ],
            [
                'judul' => 'Program "Santri Mengabdi": Ratusan Santri Diterjunkan ke Pelosok Negeri untuk Mengajar dan Berdakwah',
                'isi_konten' => '<p>Sebagai wujud nyata dari Tri Dharma Pesantren, program tahunan "Santri Mengabdi" kembali dilaksanakan. Tahun ini, lebih dari 200 santri tingkat akhir diterjunkan ke 50 desa di 10 provinsi untuk memberikan pengajaran Al-Qur\'an, fiqh dasar, serta membantu pengembangan masyarakat lokal selama satu bulan penuh. Program ini bertujuan untuk menumbuhkan kepekaan sosial dan jiwa kepemimpinan para santri.</p>',
                'status' => 'published',
            ],
        ];

        foreach ($beritas as $berita) {
            Berita::create([
                'judul' => $berita['judul'],
                'slug' => Str::slug($berita['judul']),
                'isi_konten' => $berita['isi_konten'],
                'status' => $berita['status'],
                'created_at' => now()->subDays(rand(1, 30)),
            ]);
        }

        Berita::factory(12)->create();
    }
}