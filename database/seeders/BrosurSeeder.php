<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brosur;
use App\Models\PeriodePendaftaran;
use Illuminate\Support\Facades\DB;

class BrosurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pastikan ada periode pendaftaran untuk dihubungkan
        if (PeriodePendaftaran::count() == 0) {
            $this->command->info('Tabel periode pendaftaran kosong, menjalankan PeriodePendaftaranSeeder...');
            $this->call(PeriodePendaftaranSeeder::class);
        }

        $periodes = PeriodePendaftaran::all();

        if ($periodes->isEmpty()) {
            $this->command->error('Tidak ada periode pendaftaran yang tersedia untuk membuat brosur.');
            return;
        }

        DB::table('brosurs')->delete();

        foreach ($periodes as $periode) {
            Brosur::create([
                'periode_pendaftaran_id' => $periode->id,
                'sejarah' => json_encode([
                    ['type' => 'paragraph', 'data' => ['text' => 'Didirikan pada tahun 1980, Pesantren Modern kami telah berkembang dari sebuah lembaga sederhana menjadi pusat pendidikan Islam terkemuka. Dengan fokus pada integrasi antara ilmu agama dan pengetahuan umum, kami berkomitmen untuk mencetak generasi Muslim yang cerdas, berakhlak mulia, dan siap menghadapi tantangan zaman.']],
                    ['type' => 'paragraph', 'data' => ['text' => 'Perjalanan kami dimulai dengan hanya 20 santri dan beberapa pengajar. Kini, dengan rahmat Allah, kami mendidik ribuan santri dari berbagai penjuru negeri, didukung oleh fasilitas modern dan tenaga pendidik profesional.']],
                ]),
                'visi_misi' => json_encode([
                    ['type' => 'heading', 'data' => ['level' => 2, 'text' => 'Visi Kami']],
                    ['type' => 'paragraph', 'data' => ['text' => 'Menjadi lembaga pendidikan Islam unggulan yang menghasilkan generasi Qur\'ani, berwawasan global, dan berakhlakul karimah.']],
                    ['type' => 'heading', 'data' => ['level' => 2, 'text' => 'Misi Kami']],
                    ['type' => 'list', 'data' => ['style' => 'ordered', 'items' => [
                        'Menyelenggarakan pendidikan yang seimbang antara ilmu agama, sains, dan teknologi.',
                        'Membentuk karakter santri yang berlandaskan Al-Qur\'an dan Sunnah.',
                        'Mengembangkan potensi santri dalam bidang akademik, non-akademik, dan kewirausahaan.',
                        'Membangun lingkungan pesantren yang aman, nyaman, dan kondusif untuk belajar.',
                    ]]],
                ]),
                'kurikulum_formal' => json_encode([
                    ['type' => 'heading', 'data' => ['level' => 3, 'text' => 'Kurikulum SMP & SMA (Terpadu)']],
                    ['type' => 'paragraph', 'data' => ['text' => 'Kami mengadopsi Kurikulum Merdeka dari Kemendikbudristek yang diperkaya dengan kurikulum kepesantrenan. Mata pelajaran umum seperti Matematika, IPA, IPS, dan Bahasa diajarkan secara terintegrasi dengan nilai-nilai Islam.']],
                    ['type' => 'list', 'data' => ['style' => 'unordered', 'items' => [
                        'Matematika & Sains Terapan',
                        'Bahasa Indonesia & Sastra',
                        'Bahasa Inggris & Arab (Wajib)',
                        'Ilmu Pengetahuan Sosial & Sejarah Islam',
                        'Pendidikan Jasmani & Kesehatan',
                        'Teknologi Informasi & Komunikasi (TIK)',
                    ]]],
                ]),
                'kurikulum_non_formal' => json_encode([
                    ['type' => 'heading', 'data' => ['level' => 3, 'text' => 'Program Diniyah & Kepesantrenan']],
                    ['type' => 'paragraph', 'data' => ['text' => 'Program ini adalah jantung dari pendidikan kami, bertujuan untuk memperdalam pemahaman santri terhadap ilmu-ilmu agama.']],
                    ['type' => 'list', 'data' => ['style' => 'unordered', 'items' => [
                        'Tahfidz Al-Qur\'an (Target hafalan minimal 5 Juz untuk lulus SMA)',
                        'Kajian Kitab Kuning (Aqidah, Fiqh, Akhlak, Hadits)',
                        'Bahasa Arab (Nahwu, Sharaf, Balaghah)',
                        'Muhadharah (Latihan Pidato 3 Bahasa: Indonesia, Arab, Inggris)',
                        'Praktek Ibadah dan Qiyamul Lail',
                    ]]],
                ]),
                'jadwal_kbm' => json_encode([
                    ['type' => 'heading', 'data' => ['level' => 4, 'text' => 'Contoh Jadwal Harian Santri']],
                    ['type' => 'list', 'data' => ['style' => 'unordered', 'items' => [
                        '04:00 - 05:00: Qiyamul Lail & Shalat Subuh Berjamaah',
                        '05:00 - 06:00: Halaqah Tahfidz',
                        '06:00 - 07:00: Persiapan diri & Sarapan',
                        '07:00 - 12:00: Sekolah Formal',
                        '12:00 - 13:30: Shalat Dzuhur, Makan Siang, Istirahat',
                        '13:30 - 15:00: Sekolah Formal (Lanjutan)',
                        '15:00 - 16:00: Shalat Ashar & Kajian Kitab Sore',
                        '16:00 - 17:30: Kegiatan Ekstrakurikuler',
                        '17:30 - 19:30: Shalat Maghrib, Makan Malam, Shalat Isya',
                        '19:30 - 21:00: Belajar Mandiri / Muroja\'ah Hafalan',
                        '21:00 - 04:00: Istirahat Tidur',
                    ]]],
                ]),
                'biaya' => json_encode([
                    ['type' => 'heading', 'data' => ['level' => 3, 'text' => 'Rincian Biaya Pendidikan (Contoh)']],
                    ['type' => 'paragraph', 'data' => ['text' => 'Biaya dapat berubah sewaktu-waktu. Berikut adalah rincian untuk tahun ajaran saat ini.']],
                    ['type' => 'list', 'data' => ['style' => 'unordered', 'items' => [
                        'Uang Pangkal (sekali bayar): Rp 15.000.000,- (termasuk seragam, lemari, kasur)',
                        'SPP Bulanan: Rp 1.500.000,- (termasuk asrama, makan 3x sehari, laundry)',
                        'Biaya Kegiatan Tahunan: Rp 1.000.000,- (untuk ekstrakurikuler dan kegiatan santri)',
                        'Biaya Buku: (Sesuai jenjang, dibayarkan saat daftar ulang)',
                    ]]],
                ]),
                'syarat_pendaftaran' => json_encode([
                    ['type' => 'heading', 'data' => ['level' => 3, 'text' => 'Prosedur & Syarat Pendaftaran']],
                    ['type' => 'list', 'data' => ['style' => 'ordered', 'items' => [
                        'Mengisi formulir pendaftaran online melalui website resmi kami.',
                        'Membayar biaya pendaftaran sebesar Rp 500.000,-',
                        'Mengunggah dokumen: Akta Kelahiran, Kartu Keluarga, NISN, Pas Foto terbaru.',
                        'Lulus tes seleksi masuk (Akademik, Baca Al-Qur\'an, Wawancara Orang Tua & Calon Santri).',
                        'Menandatangani surat pernyataan kesanggupan mengikuti peraturan pesantren.',
                    ]]],
                ]),
            ]);
        }

        $this->command->info('Seeder Brosur berhasil dijalankan untuk ' . $periodes->count() . ' periode.');
    }
}