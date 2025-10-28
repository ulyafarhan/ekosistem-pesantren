<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimoni;

class TestimoniSeeder extends Seeder
{
    public function run(): void
    {
        $testimonis = [
            [
                'nama' => 'Dr. H. Muhammad Al-Fatih, M.A.',
                'jabatan' => 'Dosen & Peneliti Islam Kontemporer',
                'kutipan' => 'Pesantren ini adalah kawah candradimuka yang sesungguhnya. Mereka tidak hanya mencetak penghafal Al-Qur\'an, tetapi juga pemikir-pemikir muda yang kritis, inovatif, dan siap menjawab tantangan zaman dengan landasan iman yang kokoh. Saya bangga menjadi bagian dari keluarga besar alumni.',
                'is_active' => true,
            ],
            [
                'nama' => 'Hj. Siti Aisyah, S.Pd.',
                'jabatan' => 'Orang Tua Santri & Kepala Sekolah',
                'kutipan' => 'Sebagai seorang pendidik, saya sangat selektif memilih lembaga pendidikan untuk anak saya. Di sini, saya menemukan keseimbangan sempurna antara pendidikan adab, keilmuan, dan pengembangan bakat. Anak saya tumbuh menjadi pribadi yang santun, cerdas, dan percaya diri.',
                'is_active' => true,
            ],
            [
                'nama' => 'Prof. Dr. Richard Donovan',
                'jabatan' => 'Pakar Studi Islam, Australian National University',
                'kutipan' => 'My visit to this pesantren was enlightening. It\'s a model of modern Islamic education that successfully integrates deep-rooted tradition with a forward-thinking global perspective. The students\' command of multiple languages and their critical thinking skills are truly impressive.',
                'is_active' => true,
            ],
            [
                'nama' => 'Ahmad Zaky, B.Eng., M.Sc.',
                'jabatan' => 'CEO & Founder, Tech-Startup',
                'kutipan' => 'Disiplin, kerja keras, dan kemampuan problem-solving yang saya pelajari di pesantren adalah fondasi utama kesuksesan saya di dunia teknologi. Pesantren mengajarkan saya untuk tidak pernah berhenti belajar dan selalu mencari solusi kreatif atas setiap masalah.',
                'is_active' => true,
            ],
            [
                'nama' => 'Bupati Kabupaten Sejahtera',
                'jabatan' => 'Kepala Daerah',
                'kutipan' => 'Kehadiran pesantren ini membawa berkah luar biasa bagi daerah kami. Program pengabdian masyarakatnya secara nyata telah membantu meningkatkan kualitas pendidikan dan ekonomi di desa-desa sekitar. Kami sangat mendukung penuh semua program pesantren.',
                'is_active' => true,
            ],
            [
                'nama' => 'Fatimah Azzahra, Lc.',
                'jabatan' => 'Alumni & Penerima Beasiswa Al-Azhar',
                'kutipan' => 'Bekal ilmu alat (Nahwu-Shorof) dan hafalan yang saya dapatkan di sini membuat saya mampu bersaing dan unggul di antara ribuan mahasiswa internasional di Kairo. Terima kasih, pesantrenku, atas fondasi ilmu yang tak ternilai harganya.',
                'is_active' => true,
            ],
            [
                'nama' => 'H. Abdullah, S.E.',
                'jabatan' => 'Pengusaha & Donatur Tetap',
                'kutipan' => 'Saya menyaksikan sendiri bagaimana setiap donasi yang saya berikan dikelola dengan amanah dan profesional. Melihat senyum para santri berprestasi dari keluarga kurang mampu yang bisa mengenyam pendidikan berkualitas adalah kebahagiaan yang tidak bisa diukur dengan materi.',
                'is_active' => true,
            ],
            [
                'nama' => 'Rizki Amelia, S.Ked.',
                'jabatan' => 'Alumni & Dokter Muda',
                'kutipan' => 'Pesantren mengajarkan saya tentang pentingnya empati dan pengabdian. Ilmu agama yang saya pelajari menjadi penyeimbang dan pegangan moral dalam menjalankan profesi saya sebagai seorang dokter. Saya belajar melayani pasien dengan hati.',
                'is_active' => true,
            ],
            [
                'nama' => 'Chef Junaedi, Master Chef Indonesia',
                'jabatan' => 'Juru Masak Profesional',
                'kutipan' => 'Saya terkejut dengan kualitas program kewirausahaan kuliner di pesantren ini. Santri-santrinya tidak hanya diajarkan memasak, tetapi juga manajemen bisnis, branding, dan food safety. Produk-produk mereka punya potensi besar untuk masuk ke pasar nasional.',
                'is_active' => true,
            ],
            [
                'nama' => 'Irfan Hakim',
                'jabatan' => 'Artis & Public Figure',
                'kutipan' => 'Suasana di sini begitu sejuk dan menenangkan. Interaksi saya dengan para santri dan kiai membuka wawasan baru tentang dunia pendidikan Islam yang modern dan inspiratif. Pesantren ini adalah bukti bahwa Islam adalah agama yang rahmatan lil \'alamin.',
                'is_active' => true,
            ],
            [
                'nama' => 'Joko Susilo',
                'jabatan' => 'Orang Tua Santri dari Papua',
                'kutipan' => 'Meskipun jauh dari rumah, saya merasa tenang menitipkan anak saya di sini. Sistem komunikasinya sangat baik, dan saya selalu mendapatkan laporan perkembangan anak saya secara berkala. Saya melihat perubahan positif yang luar biasa pada akhlak dan kemandiriannya.',
                'is_active' => true,
            ],
            [
                'nama' => 'Dr. (Cand.) Sarah Abdullah',
                'jabatan' => 'Alumni & Peneliti di Harvard University',
                'kutipan' => 'Kemampuan berpikir kritis dan tradisi intelektual yang diasah di pesantren menjadi modal saya untuk melanjutkan studi doktoral di luar negeri. Di sini, saya belajar untuk selalu mempertanyakan, menganalisis, dan mencari kebenaran berbasis data dan argumen yang kuat.',
                'is_active' => true,
            ],
            [
                'nama' => 'KH. Ma\'ruf Amin',
                'jabatan' => 'Tokoh Ulama Nasional',
                'kutipan' => 'Pesantren ini adalah benteng pertahanan ahlussunnah wal jama\'ah di era modern. Mereka konsisten menjaga tradisi salafus shalih sambil membuka diri terhadap perkembangan ilmu pengetahuan dan teknologi. Sebuah contoh ideal pesantren masa depan.',
                'is_active' => true,
            ],
            [
                'nama' => 'Putri, Santriwati Kelas 10',
                'jabatan' => 'Santriwati',
                'kutipan' => 'Awalnya takut jauh dari orang tua, tapi ternyata di sini seru sekali! Kakak-kakak kelas dan para ustadzah sangat baik dan perhatian. Saya jadi punya banyak teman dari seluruh Indonesia dan belajar banyak hal baru setiap hari.',
                'is_active' => true,
            ],
            [
                'nama' => 'Pak Budi, Petani Lokal',
                'jabatan' => 'Mitra Program Agrobisnis Pesantren',
                'kutipan' => 'Sejak bekerja sama dengan pesantren, hasil panen saya meningkat pesat. Para santri yang magang di sini membawa ilmu-ilmu pertanian modern yang sangat membantu kami, para petani tradisional. Alhamdulillah, ekonomi keluarga kami jadi lebih baik.',
                'is_active' => true,
            ],
        ];

        foreach ($testimonis as $testimoni) {
            Testimoni::create($testimoni);
        }
    }
}