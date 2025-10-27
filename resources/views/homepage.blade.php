<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesantren Pusat - Mendidik Generasi Qur'ani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-800">

    <div 
        x-data="{
            slides: {{ $heroSliders->pluck('gambar')->toJson() }},
            activeSlide: 1,
            autoplay: null,
            loop() {
                this.autoplay = setInterval(() => {
                    this.activeSlide = this.activeSlide === this.slides.length ? 1 : this.activeSlide + 1;
                }, 5000); // Ganti gambar setiap 5 detik
            },
            init() {
                this.loop();
            }
        }"
        x-init="init()"
        class="relative min-h-screen bg-black"
    >
        <template x-for="(slide, index) in slides" :key="index">
            <div 
                x-show="activeSlide === index + 1"
                class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000"
                :style="'background-image: url(/storage/' + slide + ');'"
                x-transition:enter="ease-out"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
            ></div>
        </template>

        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        
        <nav class="relative container mx-auto px-6 py-8">
            <div class="flex justify-between items-center">
                <div class="text-2xl font-bold text-white">Pesantren Pusat</div>
                <div class="hidden md:flex space-x-8 text-white">
                    <a href="{{ route('homepage') }}" class="hover:text-blue-300">Home</a>
                    <a href="{{ route('berita.index') }}" class="hover:text-blue-300">Berita</a>
                    <a href="{{ route('galeri.index') }}" class="hover:text-blue-300">Galeri</a>
                    <a href="{{ route('pengurus.index') }}" class="hover:text-blue-300">Struktur</a>
                    <a href="{{ route('tokoh.sejarah.index') }}" class="hover:text-blue-300">Sejarah</a>
                </div>
                <a href="#kontak" class="hidden md:block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">Kontak Kami</a>
            </div>
        </nav>

        <div class="relative container mx-auto px-6 flex flex-col items-center justify-center text-center text-white" style="height: 80vh;">
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-4">Membentuk Generasi Unggul, Berakhlak Qur'ani</h1>
            <p class="text-lg md:text-xl max-w-3xl mx-auto mb-8">Menjadi pusat pendidikan Islam yang modern dan berintegritas, mencetak pemimpin masa depan yang bertakwa dan berwawasan luas.</p>
            <a href="#profil" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-8 rounded-lg text-lg transition duration-300">
                Selengkapnya
            </a>
        </div>

        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex space-x-3">
            <template x-for="i in slides.length" :key="i">
                <button @click="activeSlide = i; clearInterval(autoplay); loop();" 
                        :class="{'bg-white': activeSlide === i, 'bg-white/50': activeSlide !== i}" 
                        class="w-3 h-3 rounded-full hover:bg-white transition"></button>
            </template>
        </div>
    </div>

    @if ($pendaftaranAktif)
    <section class="bg-yellow-100 border-b border-yellow-200">
        <div class="container mx-auto py-6 px-6 text-center">
            <h2 class="text-2xl font-bold text-yellow-800 mb-2">Pendaftaran Santri Baru Telah Dibuka: {{ $pendaftaranAktif->nama_periode }}!</h2>
            <p class="text-yellow-700 mb-4">Periode: {{ $pendaftaranAktif->tanggal_mulai->format('d M') }} - {{ $pendaftaranAktif->tanggal_selesai->format('d M Y') }}</p>
            <div class="flex flex-wrap justify-center gap-4">
                @foreach ($pendaftaranAktif->kontakPanitia as $kontak)
                    <a href="https://wa.me/{{ $kontak->nomor_wa }}" target="_blank" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-transform transform hover:scale-105">
                        Hubungi Panitia: {{ $kontak->nama }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-3">Program Unggulan Kami</h2>
            <p class="text-gray-600 max-w-2xl mx-auto mb-12">Fokus kami adalah memberikan pendidikan terbaik yang seimbang antara ilmu dunia dan akhirat.</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                @forelse ($programUnggulan as $program)
                <div class="text-center">
                    <div class="bg-blue-500 text-white w-16 h-16 rounded-full mx-auto flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v11.494m-9-5.747h18"/></svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">{{ $program->nama }}</h3>
                    <p class="text-gray-500">{{ Str::limit(strip_tags($program->deskripsi), 100) }}</p>
                </div>
                @empty
                <p class="md:col-span-3">Program unggulan akan segera ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold mb-12 text-center">Berita & Kegiatan Terbaru</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                 @foreach ($beritaTerbaru as $berita)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                        <a href="{{ route('berita.show', $berita) }}">
                            <img src="{{ asset('storage/' . $berita->thumbnail) }}" alt="{{ $berita->judul }}" class="w-full h-56 object-cover">
                        </a>
                        <div class="p-6">
                            <p class="text-sm text-gray-500 mb-2">{{ $berita->created_at->format('d F Y') }}</p>
                            <h3 class="text-xl font-semibold mb-3 h-20">{{ Str::limit($berita->judul, 60) }}</h3>
                            <a href="{{ route('berita.show', $berita) }}" class="text-blue-500 hover:text-blue-600 font-semibold">Baca Selengkapnya &rarr;</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-12">
                <a href="{{ route('berita.index') }}" class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-3 px-8 rounded-lg transition duration-300">Lihat Semua Berita</a>
            </div>
        </div>
    </section>

    @if($sejarahSingkat)
    <section id="profil" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="https://images.unsplash.com/photo-1618077360395-f3068be8e001?q=80&w=2070&auto=format&fit=crop" alt="Profil Pesantren" class="rounded-lg shadow-2xl w-full">
                </div>
                <div>
                    <h2 class="text-3xl font-bold mb-4">Profil & Sejarah Singkat</h2>
                    <div class="prose max-w-none text-gray-600">
                        {!! Str::limit(strip_tags($sejarahSingkat->konten), 500) !!}
                    </div>
                    <a href="{{-- route('sejarah.smp') --}}" class="mt-6 inline-block text-blue-500 hover:text-blue-600 font-semibold">Pelajari Sejarah Kami Lebih Dalam &rarr;</a>
                </div>
            </div>
        </div>
    </section>
    @endif

    <section class="py-20">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-12">Apa Kata Mereka?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-8 rounded-lg shadow-md">
                    <p class="text-gray-600 mb-6">"Pendidikan di sini luar biasa. Anak saya tidak hanya cerdas secara akademis, tetapi juga memiliki akhlak yang sangat baik."</p>
                    <div class="flex items-center justify-center">
                        <img class="w-12 h-12 rounded-full mr-4" src="https://i.pravatar.cc/150?img=1" alt="Avatar">
                        <div>
                            <p class="font-semibold">Budi Santoso</p>
                            <p class="text-sm text-gray-500">Wali Santri</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 p-8 rounded-lg shadow-md">
                    <p class="text-gray-600 mb-6">"Lingkungan yang sangat mendukung untuk menghafal Al-Qur'an dan mendalami ilmu agama. Saya sangat bersyukur pernah belajar di sini."</p>
                    <div class="flex items-center justify-center">
                        <img class="w-12 h-12 rounded-full mr-4" src="https://i.pravatar.cc/150?img=2" alt="Avatar">
                        <div>
                            <p class="font-semibold">Ahmad Fauzi</p>
                            <p class="text-sm text-gray-500">Alumni 2020</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 p-8 rounded-lg shadow-md">
                     <p class="text-gray-600 mb-6">"Fasilitasnya lengkap dan para pengajarnya sangat berdedikasi. Tempat terbaik untuk menimba ilmu dan membentuk karakter."</p>
                    <div class="flex items-center justify-center">
                        <img class="w-12 h-12 rounded-full mr-4" src="https://i.pravatar.cc/150?img=3" alt="Avatar">
                        <div>
                            <p class="font-semibold">Siti Aminah</p>
                            <p class="text-sm text-gray-500">Wali Santri</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="kontak" class="bg-gray-800 text-white py-16">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Pesantren Pusat</h3>
                    <p class="text-gray-400">Membentuk generasi Rabbani yang cerdas, mandiri, dan berakhlakul karimah.</p>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Navigasi Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('berita.index') }}" class="text-gray-400 hover:text-white">Berita</a></li>
                        <li><a href="{{ route('galeri.index') }}" class="text-gray-400 hover:text-white">Galeri</a></li>
                        <li><a href="{{ route('pengurus.index') }}" class="text-gray-400 hover:text-white">Struktur Pengurus</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Tentang Kami</h3>
                    <ul class="space-y-2">
                         <li><a href="{{ route('tokoh.sejarah.index') }}" class="text-gray-400 hover:text-white">Sejarah</a></li>
                         <li><a href="#" class="text-gray-400 hover:text-white">Visi & Misi</a></li>
                         <li><a href="#" class="text-gray-400 hover:text-white">Program & Fasilitas</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Hubungi Kami</h3>
                    <p class="text-gray-400">Jl. Pendidikan No. 1, Kota Santri</p>
                    <p class="text-gray-400">Email: info@pesantrenpusat.id</p>
                    </div>
            </div>
            <div class="mt-12 border-t border-gray-700 pt-6 text-center text-gray-500">
                <p>&copy; {{ date('Y') }} Pesantren Pusat. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>