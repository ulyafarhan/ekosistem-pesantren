<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Berita::truncate();
        Schema::enableForeignKeyConstraints();

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
            [
                'judul' => 'Gelar Festival Budaya Islam Nusantara, Pesantren Lestarikan Kesenian Lokal',
                'isi_konten' => '<p>Untuk pertama kalinya, Pesantren Pusat menggelar Festival Budaya Islam Nusantara yang menampilkan berbagai kesenian seperti hadrah, marawis, kaligrafi, hingga pertunjukan wayang kulit dengan lakon Islami. Acara ini bertujuan untuk mengenalkan kekayaan budaya Islam Indonesia kepada generasi muda dan menangkal paham radikalisme.</p>',
                'status' => 'published',
            ],
            [
                'judul' => 'Santri Ciptakan Sistem Pertanian Hidroponik Otomatis untuk Ketahanan Pangan Pesantren',
                'isi_konten' => '<p>Di tengah isu ketahanan pangan global, sekelompok santri dari jurusan agroteknologi berhasil merancang dan membangun sistem pertanian hidroponik otomatis di lahan pesantren. Sistem yang dikontrol melalui aplikasi mobile ini mampu menghasilkan sayuran organik untuk memenuhi kebutuhan gizi seluruh warga pesantren.</p>',
                'status' => 'published',
            ],
            [
                'judul' => 'Tim Debat Bahasa Arab Pesantren Juarai Kompetisi Tingkat ASEAN',
                'isi_konten' => '<p>Tim debat bahasa Arab Pesantren Pusat kembali mengukir prestasi di kancah internasional dengan meraih Juara 1 dalam Kompetisi Debat Bahasa Arab antar Universitas dan Pesantren se-ASEAN. Kemenangan ini membuktikan kualitas pendidikan bahasa Arab di pesantren yang tidak kalah dengan lembaga pendidikan formal lainnya.</p>',
                'status' => 'published',
            ],
            [
                'judul' => 'Peluncuran Buku "Fiqh Kontemporer di Era Digital" Karya Kiai Sepuh Pesantren',
                'isi_konten' => '<p>Kiai Haji Abdullah, salah satu kiai sepuh di Pesantren Pusat, meluncurkan buku terbarunya yang berjudul "Fiqh Kontemporer di Era Digital". Buku ini membahas berbagai persoalan fiqh yang muncul akibat perkembangan teknologi, seperti hukum jual beli online, cryptocurrency, dan etika di media sosial.</p>',
                'status' => 'published',
            ],
            [
                'judul' => 'Pesantren Ramah Lingkungan: Gerakan Tanam 10.000 Pohon dan Pengelolaan Sampah Mandiri',
                'isi_konten' => '<p>Menyikapi isu perubahan iklim, Pesantren Pusat meluncurkan gerakan "Pesantren Hijau" dengan menanam 10.000 pohon di sekitar area pesantren dan membangun fasilitas pengelolaan sampah mandiri. Gerakan ini melibatkan seluruh santri dan masyarakat sekitar sebagai bentuk edukasi lingkungan.</p>',
                'status' => 'published',
            ],
            [
                'judul' => 'Kisah Inspiratif Alumni: Dari Pesantren hingga Menjadi CEO Startup Teknologi',
                'isi_konten' => '<p>Majalah internal pesantren edisi terbaru mengangkat kisah sukses Ahmad Zaky, seorang alumni yang kini menjabat sebagai CEO sebuah startup teknologi di Silicon Valley. Kisahnya memberikan inspirasi bahwa latar belakang pendidikan pesantren bukanlah halangan untuk berkarir di industri teknologi global.</p>',
                'status' => 'published',
            ],
            [
                'judul' => 'Haflah Akhirussanah Meriah, Ribuan Wali Santri Hadiri Prosesi Wisuda',
                'isi_konten' => '<p>Seperti tahun-tahun sebelumnya, Haflah Akhirussanah atau perayaan akhir tahun ajaran di Pesantren Pusat berlangsung meriah. Ribuan wali santri dari berbagai daerah datang untuk menyaksikan prosesi wisuda putra-putri mereka yang telah menyelesaikan pendidikan di tingkat Aliyah.</p>',
                'status' => 'published',
            ],
            [
                'judul' => 'Pesantren Gelar Pelatihan Kewirausahaan, Cetak Santripreneur Mandiri',
                'isi_konten' => '<p>Bekerja sama dengan dinas koperasi dan UKM setempat, Pesantren Pusat menyelenggarakan pelatihan kewirausahaan intensif selama satu bulan. Pelatihan ini membekali para santri dengan keterampilan praktis di bidang kuliner, fashion, dan digital marketing untuk menciptakan santripreneur yang mandiri setelah lulus.</p>',
                'status' => 'published',
            ],
            [
                'judul' => 'Studi Banding: Pesantren Terima Kunjungan dari Ratusan Pelajar Jepang',
                'isi_konten' => '<p>Dalam rangka pertukaran budaya, Pesantren Pusat menerima kunjungan dari rombongan pelajar sebuah sekolah menengah di Jepang. Para pelajar Jepang tersebut belajar tentang kehidupan di pesantren, mengikuti beberapa kelas, dan berinteraksi langsung dengan para santri.</p>',
                'status' => 'published',
            ],
            [
                'judul' => 'Tim Robotik Santri Raih Medali Emas di Kontes Robot Internasional',
                'isi_konten' => '<p>Tim robotik Pesantren Pusat yang diberi nama "SantriTech" berhasil meraih medali emas dalam kategori robot pemadam api di ajang Kontes Robot Internasional di Singapura. Prestasi ini menunjukkan bahwa santri juga mampu bersaing di bidang teknologi dan rekayasa.</p>',
                'status' => 'published',
            ],
            [
                'judul' => 'Peringatan Maulid Nabi: Pawai Obor dan Tabligh Akbar Hadirkan Penceramah Kondang',
                'isi_konten' => '<p>Peringatan Maulid Nabi Muhammad SAW di Pesantren Pusat tahun ini diisi dengan berbagai kegiatan, mulai dari pawai obor keliling desa, lomba-lomba keagamaan, hingga ditutup dengan Tabligh Akbar yang menghadirkan penceramah kondang dari ibu kota.</p>',
                'status' => 'published',
            ],
            [
                'judul' => 'Santriwati Pelopori Gerakan Anti-Hoax di Media Sosial',
                'isi_konten' => '<p>Prihatin dengan maraknya berita bohong atau hoax, sekelompok santriwati menginisiasi sebuah gerakan literasi digital bernama "Tabayyun Dulu, Share Kemudian". Gerakan ini aktif mengkampanyekan pentingnya verifikasi informasi sebelum menyebarkannya di media sosial melalui berbagai konten kreatif.</p>',
                'status' => 'published',
            ],
        ];

        foreach ($beritas as $berita) {
            Berita::create([
                'judul' => $berita['judul'],
                'slug' => Str::slug($berita['judul']),
                'isi_konten' => $berita['isi_konten'],
                'status' => $berita['status'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}