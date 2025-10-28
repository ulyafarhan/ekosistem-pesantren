<?php

namespace Database\Seeders;

use App\Models\SejarahUnitPendidikan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SejarahUnitPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SejarahUnitPendidikan::create([
            'sejarah_smp' => '<h1>Sejarah Berdirinya SMP Islam Unggulan</h1>
<p>Didirikan pada tahun 2005, SMP Islam Unggulan lahir dari sebuah gagasan besar para pendiri pesantren untuk menjawab tantangan zaman. Saat itu, muncul kebutuhan mendesak akan sebuah lembaga pendidikan menengah yang tidak hanya unggul dalam bidang akademis, tetapi juga kokoh dalam pendidikan karakter dan keislaman. Berangkat dari keprihatinan tersebut, unit SMP dirintis dengan tujuan mulia: mencetak generasi muda yang cerdas secara intelektual, matang secara emosional, dan mendalam secara spiritual.</p>
<p>Pada awal berdirinya, dengan segala keterbatasan sarana, proses belajar mengajar dimulai dengan memanfaatkan beberapa ruangan di bangunan utama pesantren. Namun, semangat para guru perintis dan antusiasme angkatan pertama yang hanya berjumlah 30 santri menjadi bahan bakar utama. Kurikulum dirancang secara cermat, memadukan kurikulum nasional dengan program-program keagamaan intensif seperti tahfidz Al-Qur\'an, kajian kitab kuning dasar, dan pembiasaan akhlakul karimah dalam kehidupan sehari-hari.</p>
<p>Seiring berjalannya waktu, kepercayaan masyarakat semakin meningkat. Jumlah pendaftar terus bertambah setiap tahunnya. Hal ini mendorong yayasan untuk membangun kompleks gedung SMP yang lebih representatif, dilengkapi dengan laboratorium, perpustakaan, dan sarana olahraga. Kini, SMP Islam Unggulan telah menjadi salah satu sekolah menengah pertama favorit di tingkat regional, dengan segudang prestasi di bidang akademik, olahraga, dan seni, tanpa pernah meninggalkan identitasnya sebagai lembaga pendidikan berbasis pesantren.</p>',
            'sejarah_sma' => '<h1>Sejarah Berdirinya SMA Islam Berwawasan Global</h1>
<p>Menyusul kesuksesan unit SMP dan untuk menyediakan jenjang pendidikan lanjutan yang linear, SMA Islam Berwawasan Global secara resmi dibuka pada tahun 2008. Pendirian unit SMA ini merupakan langkah strategis pesantren untuk mempersiapkan para lulusan agar mampu bersaing di tingkat pendidikan tinggi, baik di dalam maupun di luar negeri, serta siap menjadi pemimpin masa depan.</p>
<p>Visi yang diusung sejak awal adalah “Mencetak Intelektual Muslim Berwawasan Global yang Berpijak pada Nilai-Nilai Luhur Pesantren”. Untuk mewujudkan visi tersebut, SMA Islam Berwawasan Global membuka tiga jurusan peminatan: Sains dan Teknologi, Ilmu Sosial dan Humaniora, serta Ilmu Keagamaan Lanjutan. Kurikulum diperkaya dengan program-program unggulan seperti kelas debat internasional, riset ilmiah, program pertukaran pelajar, serta sertifikasi bahasa asing (Arab dan Inggris).</p>
<p>Salah satu tonggak sejarah penting adalah pada tahun 2015, ketika SMA Islam Berwawasan Global menjalin kemitraan strategis dengan beberapa universitas ternama di Timur Tengah, Eropa, dan Australia. Kemitraan ini membuka jalur khusus bagi para lulusan terbaik untuk mendapatkan beasiswa dan melanjutkan studi di luar negeri. Hingga saat ini, ratusan alumni telah tersebar di berbagai belahan dunia, berkiprah di berbagai bidang profesional sambil tetap membawa nama baik almamater dan nilai-nilai keislaman yang telah mereka pelajari.</p>',
        ]);
    }
}