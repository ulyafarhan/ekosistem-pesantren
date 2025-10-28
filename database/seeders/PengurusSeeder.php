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
            [
                'nama_lengkap' => 'Dr. Hj. Aisyah Rahman, M.Psi.',
                'jabatan' => 'Ketua Bidang Kepesantrenan Putri',
                'biografi_singkat' => 'Psikolog dan pakar pendidikan karakter, beliau fokus pada pengembangan santriwati yang cerdas, mandiri, dan berakhlak mulia. Beliau menginisiasi program \'Sisterhood\' untuk membangun solidaritas dan kepemimpinan di kalangan santriwati.',
            ],
            [
                'nama_lengkap' => 'Ir. H. Budi Santoso, M.T.',
                'jabatan' => 'Ketua Bidang Sarana & Prasarana',
                'biografi_singkat' => 'Insinyur sipil yang berpengalaman dalam proyek-proyek besar. Beliau memastikan semua fasilitas fisik pesantren, mulai dari asrama, masjid, hingga fasilitas olahraga, dibangun dan dipelihara dengan standar kualitas tertinggi untuk kenyamanan dan keamanan santri.',
            ],
            [
                'nama_lengkap' => 'K.H. Hasanuddin, Lc.',
                'jabatan' => 'Ketua Bidang Tahfidz Al-Qur\'an',
                'biografi_singkat' => 'Seorang hafidz dengan sanad qira\'ah yang bersambung hingga Rasulullah SAW. Beliau mengembangkan metode menghafal Al-Qur\'an yang efektif dan menyenangkan, menghasilkan ratusan hafidz dan hafidzah setiap tahunnya.',
            ],
            [
                'nama_lengkap' => 'H. Zulkifli Anwar, S.Kom., M.M.',
                'jabatan' => 'Ketua Bidang Kewirausahaan & Ekonomi',
                'biografi_singkat' => 'Praktisi bisnis dan startup, beliau mendirikan unit-unit usaha produktif di lingkungan pesantren, seperti minimarket, peternakan, dan agrobisnis. Tujuannya adalah untuk melatih jiwa kewirausahaan santri dan mencapai kemandirian ekonomi pesantren.',
            ],
            [
                'nama_lengkap' => 'Drs. H. Ismail Marzuki, M.A.',
                'jabatan' => 'Ketua Bidang Bahasa & Budaya',
                'biografi_singkat' => 'Pemerhati bahasa dan sastra Arab, beliau menciptakan lingkungan berbahasa yang imersif di pesantren. Di bawah arahannya, santri tidak hanya fasih berbahasa Arab dan Inggris, tetapi juga mampu mengapresiasi karya-karya sastra klasik dan kontemporer.',
            ],
            [
                'nama_lengkap' => 'Hj. Dr. Nurul Hidayati, M.Kes.',
                'jabatan' => 'Ketua Bidang Kesehatan & Lingkungan',
                'biografi_singkat' => 'Dokter dan aktivis kesehatan masyarakat. Beliau memimpin poliklinik pesantren dan menggalakkan program-program promotif dan preventif, seperti penyuluhan gizi, senam pagi, dan pengelolaan sampah organik, untuk menciptakan lingkungan pesantren yang sehat.',
            ],
            [
                'nama_lengkap' => 'Ust. Amirullah, S.S., M.Hum.',
                'jabatan' => 'Ketua Bidang Ekstrakurikuler & Pengembangan Bakat',
                'biografi_singkat' => 'Seniman dan budayawan, beliau percaya bahwa setiap santri memiliki bakat unik. Beliau membuka beragam kegiatan ekstrakurikuler, mulai dari kaligrafi, teater, hadrah, hingga klub robotik, untuk menyalurkan dan mengembangkan potensi non-akademik santri.',
            ],
            [
                'nama_lengkap' => 'K.H. Jafar Shodiq, M.Fil.I.',
                'jabatan' => 'Ketua Bidang Kajian Kitab Kuning',
                'biografi_singkat' => 'Spesialis kajian kitab-kitab turats, beliau menjaga tradisi intelektual pesantren salaf. Majelis-majelis pengajian kitab kuning yang beliau asuh selalu dipenuhi santri yang haus akan ilmu-ilmu keislaman yang otentik dan mendalam.',
            ],
            [
                'nama_lengkap' => 'H. Rahmat Effendi, S.IP., M.I.Pol.',
                'jabatan' => 'Ketua Bidang Hubungan Masyarakat & Alumni',
                'biografi_singkat' => 'Pakar komunikasi dan jaringan, beliau membangun jembatan antara pesantren dengan dunia luar. Beliau aktif menjalin kemitraan strategis dengan berbagai institusi dan mengelola jaringan alumni yang solid untuk mendukung kemajuan pesantren.',
            ],
        ];

        foreach ($pengurus as $data) {
            Pengurus::create($data);
        }
    }
}