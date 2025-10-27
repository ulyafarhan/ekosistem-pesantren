<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\PeriodePendaftaran;
use App\Models\KontakPanitia;
use App\Models\Brosur;

class PeriodePendaftaranSeeder extends Seeder
{
    public function run(): void
    {
        $periodeAktif = PeriodePendaftaran::create([
            'tahun_ajaran' => '2026/2027',
            'tanggal_buka' => now()->startOfMonth(),
            'tanggal_tutup' => now()->addMonths(2),
            'status' => 'dibuka',
        ]);

        KontakPanitia::create([
            'periode_pendaftaran_id' => $periodeAktif->id,
            'nama' => 'Ustadz Amir (Panitia Putra)',
            'nomor_wa' => '6281234567890',
        ]);
        KontakPanitia::create([
            'periode_pendaftaran_id' => $periodeAktif->id,
            'nama' => 'Ustadzah Aisyah (Panitia Putri)',
            'nomor_wa' => '6281234567891',
        ]);

        $periodeTidakAktif = PeriodePendaftaran::create([
            'tahun_ajaran' => '2025/2026',
            'tanggal_buka' => now()->subYear(),
            'tanggal_tutup' => now()->subYear()->addMonths(2),
            'status' => 'ditutup',
        ]);

        Brosur::create([
            'periode_pendaftaran_id' => $periodeAktif->id,
            'sejarah' => '<h1>Sejarah Singkat Pesantren Modern</h1><p>Didirikan pada tahun 1990, pesantren kami berkomitmen untuk mencetak generasi Qurani yang berakhlak mulia dan berwawasan global.</p>',
            'visi_misi' => '<h1>Visi & Misi</h1><p>Menjadi lembaga pendidikan Islam terdepan dalam mencetak hafidz dan hafidzah yang mampu berkontribusi bagi masyarakat.</p>',
            'kurikulum_formal' => '<h1>Kurikulum Formal</h1><p>Menggunakan kurikulum nasional yang diperkaya dengan program tahfidz dan bahasa internasional.</p>',
            'kurikulum_non_formal' => '<h1>Kurikulum Non-Formal</h1><p>Kegiatan ekstrakurikuler seperti kaligrafi, hadrah, dan public speaking untuk mengembangkan bakat santri.</p>',
            'jadwal_kbm' => '<h1>Jadwal KBM</h1><p>Proses belajar mengajar dimulai dari pukul 07.00 hingga 15.00, diselingi dengan istirahat dan shalat berjamaah.</p>',
            'biaya' => '<h1>Rincian Biaya</h1><p>Biaya pendaftaran: Rp 500.000,-. SPP bulanan: Rp 1.000.000,- (sudah termasuk asrama dan makan 3x sehari).</p>',
            'syarat_pendaftaran' => '<h1>Syarat Pendaftaran</h1><p>1. Fotokopi Ijazah terakhir. 2. Fotokopi Kartu Keluarga. 3. Pas foto 3x4 (2 lembar).</p>',
        ]);

        Brosur::create([
            'periode_pendaftaran_id' => $periodeTidakAktif->id,
            'sejarah' => '<h1>Sejarah Pesantren (Arsip)</h1><p>Informasi sejarah untuk periode yang telah lalu.</p>',
            'visi_misi' => '<h1>Visi & Misi (Arsip)</h1><p>Informasi visi dan misi untuk periode yang telah lalu.</p>',
            'kurikulum_formal' => '<h1>Kurikulum Formal (Arsip)</h1><p>Informasi kurikulum untuk periode yang telah lalu.</p>',
            'kurikulum_non_formal' => '<h1>Kurikulum Non-Formal (Arsip)</h1><p>Informasi kegiatan untuk periode yang telah lalu.</p>',
            'jadwal_kbm' => '<h1>Jadwal KBM (Arsip)</h1><p>Informasi jadwal untuk periode yang telah lalu.</p>',
            'biaya' => '<h1>Biaya (Arsip)</h1><p>Informasi biaya untuk periode yang telah lalu.</p>',
            'syarat_pendaftaran' => '<h1>Syarat Pendaftaran (Arsip)</h1><p>Informasi syarat pendaftaran untuk periode yang telah lalu.</p>',
        ]);
    }
}