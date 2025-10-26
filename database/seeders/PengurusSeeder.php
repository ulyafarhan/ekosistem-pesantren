<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengurus;

class PengurusSeeder extends Seeder
{
    public function run(): void
    {
        $pengurus = [
            [
                'nama_lengkap' => 'Dr. K.H. Ahmad Dahlan Al-Hafidz',
                'jabatan' => 'Ketua Umum',
                'biografi_singkat' => 'Seorang visioner di bidang pendidikan Islam modern, beliau memadukan kurikulum berbasis iman dengan ilmu pengetahuan kontemporer. Lulusan Universitas Al-Azhar, Kairo, dengan spesialisasi Tafsir dan Ulumul Qur\'an. Di bawah kepemimpinannya, pesantren meraih akreditasi internasional.',
            ],
            [
                'nama_lengkap' => 'Prof. Dr. Ir. H. Muhammad Natsir, M.Sc.',
                'jabatan' => 'Ketua Bidang Pendidikan',
                'biografi_singkat' => 'Pakar teknologi pendidikan lulusan Institut Teknologi Bandung dan University of Cambridge. Beliau adalah arsitek di balik program digitalisasi pesantren, mengintegrasikan e-learning dan laboratorium sains canggih untuk mencetak santri yang siap menghadapi tantangan global.',
            ],
            [
                'nama_lengkap' => 'Hj. Fatimah Az-Zahra, Lc., M.A.',
                'jabatan' => 'Sekretaris',
                'biografi_singkat' => 'Alumnus Universitas Islam Madinah dengan predikat cum laude di bidang Fiqh dan Ushul Fiqh. Beliau bertanggung jawab atas administrasi dan korespondensi strategis pesantren, memastikan semua operasional berjalan efisien dan sesuai dengan standar tata kelola modern.',
            ],
            [
                'nama_lengkap' => 'H. Sulaiman Al-Faruq, S.E., Ak.',
                'jabatan' => 'Bendahara',
                'biografi_singkat' => 'Seorang akuntan publik bersertifikat yang mengabdikan ilmunya untuk pengelolaan keuangan pesantren. Dengan prinsip transparansi dan akuntabilitas, beliau berhasil mengelola dana umat untuk pembangunan infrastruktur dan program beasiswa santri berprestasi.',
            ],
            [
                'nama_lengkap' => 'Ust. Dr. Abdullah bin Zubair, M.Pd.',
                'jabatan' => 'Ketua Bidang Dakwah',
                'biografi_singkat' => 'Ahli dalam bidang retorika dan dakwah kontemporer. Beliau merancang program-program pengabdian masyarakat yang inovatif, mengirimkan santri-santri terbaik untuk berdakwah di daerah pedalaman dan pusat-pusat urban, menyebarkan pesan Islam yang damai dan mencerahkan.',
            ],
            [
                'nama_lengkap' => 'Drs. H. Yusuf Al-Makassari',
                'jabatan' => 'Wakil Ketua',
                'biografi_singkat' => 'Berpengalaman lebih dari 20 tahun dalam manajemen organisasi Islam. Beliau bertugas mengawasi operasional harian dan implementasi program strategis, memastikan visi Ketua Umum dapat dieksekusi dengan sempurna di semua lini.',
            ],
        ];

        foreach ($pengurus as $data) {
            Pengurus::create($data);
        }
    }
}