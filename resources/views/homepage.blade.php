<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Website resmi Pesantren Pusat, pusat pendidikan Islam yang modern dan berintegritas untuk mencetak generasi Qur'ani.">
    <meta name="keywords" content="pesantren, pendidikan islam, sekolah islam, pendaftaran santri">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesantren Pusat - Mendidik Generasi Qur'ani</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-white text-gray-800">

    <div 
        x-data="{
            slides: {{ $heroSliders->pluck('gambar')->filter()->values()->toJson() }}},
            activeSlide: 1,
            autoplay: null,
            loop() {
                if (this.slides.length <= 1) return;
                this.autoplay = setInterval(() => {
                    this.activeSlide = this.activeSlide === this.slides.length ? 1 : this.activeSlide + 1;
                }, 5000);
            },
            init() { this.loop(); },
            scrolled: false,
            navOpen: false
        }"
        @scroll.window="scrolled = (window.pageYOffset > 50)"
        class="relative min-h-screen bg-gray-900"
    >
        <template x-for="(slide, index) in slides" :key="index">
            <div 
                x-show="activeSlide === index + 1"
                class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000"
                :style="'background-image: url(/storage/' + slide + ');'"
                x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            ></div>
        </template>
        @if($heroSliders->isEmpty())
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1594799385012-ce00b234952f?q=80&w=2070&auto=format&fit=crop');"></div>
        @endif

        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/70 to-transparent"></div>
        
        <nav :class="{ 'bg-white shadow-md': scrolled, 'bg-transparent': !scrolled }" class="sticky top-0 z-50 w-full h-20 transition-colors duration-300">
            <div class="container mx-auto px-6 h-full">
                <div class="flex justify-between items-center h-full">
                    <a href="{{ route('homepage') }}" class="text-2xl font-bold tracking-wide" :class="{'text-gray-800': scrolled, 'text-white': !scrolled}">Pesantren Pusat</a>
                    
                    <div class="hidden md:flex items-center space-x-8 font-medium text-sm">
                        <a href="{{ route('homepage') }}" :class="{'text-gray-600 hover:text-blue-600': scrolled, 'text-white hover:text-blue-300': !scrolled}" class="transition-colors">Home</a>
                        <a href="{{ route('program.index') }}" :class="{'text-gray-600 hover:text-blue-600': scrolled, 'text-white hover:text-blue-300': !scrolled}" class="transition-colors">Program</a><a href="{{ route('program.index') }}" :class="{'text-gray-600 hover:text-blue-600': scrolled, 'text-white hover:text-blue-300': !scrolled}" class="transition-colors">Program</a>
                        <a href="{{ route('berita.index') }}" :class="{'text-gray-600 hover:text-blue-600': scrolled, 'text-white hover:text-blue-300': !scrolled}" class="transition-colors">Berita</a>
                        <a href="{{ route('galeri.index') }}" :class="{'text-gray-600 hover:text-blue-600': scrolled, 'text-white hover:text-blue-300': !scrolled}" class="transition-colors">Galeri</a>
                        <a href="{{ route('pengurus.index') }}" :class="{'text-gray-600 hover:text-blue-600': scrolled, 'text-white hover:text-blue-300': !scrolled}" class="transition-colors">Struktur</a>
                        <a href="{{ route('tokoh.sejarah.index') }}" :class="{'text-gray-600 hover:text-blue-600': scrolled, 'text-white hover:text-blue-300': !scrolled}" class="transition-colors">Sejarah</a>
                        <a href="#kontak" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg shadow-lg transition duration-300 transform hover:scale-105">Kontak Kami</a>
                    </div>

                    <div class="md:hidden">
                        <button @click="navOpen = !navOpen" :class="{'text-gray-800': scrolled, 'text-white': !scrolled}" class="focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path :class="{'hidden': navOpen, 'inline-flex': !navOpen }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                <path :class="{'hidden': !navOpen, 'inline-flex': navOpen }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div :class="{'block': navOpen, 'hidden': !navOpen}" class="md:hidden bg-white text-gray-600">
                <a href="{{ route('homepage') }}" class="block py-2 px-4 text-sm hover:bg-gray-100">Home</a>
                <a href="{{ route('berita.index') }}" class="block py-2 px-4 text-sm hover:bg-gray-100">Berita</a>
                <a href="{{ route('galeri.index') }}" class="block py-2 px-4 text-sm hover:bg-gray-100">Galeri</a>
                <a href="{{ route('pengurus.index') }}" class="block py-2 px-4 text-sm hover:bg-gray-100">Struktur</a>
                <a href="{{ route('tokoh.sejarah.index') }}" class="block py-2 px-4 text-sm hover:bg-gray-100">Sejarah</a>
                <a href="#kontak" class="block py-2 px-4 text-sm hover:bg-gray-100">Kontak Kami</a>
            </div>
        </nav>

        <div class="relative container mx-auto px-6 flex flex-col items-center justify-center text-center text-white" style="height: 80vh;">
            <h1 class="text-4xl md:text-6xl font-extrabold !leading-tight mb-4">Membentuk Generasi Unggul, Berakhlak Qur'ani</h1>
            <p class="text-lg md:text-xl max-w-3xl mx-auto mb-8 text-gray-200">Menjadi pusat pendidikan Islam yang modern dan berintegritas, mencetak pemimpin masa depan yang bertakwa dan berwawasan luas.</p>
            <a href="#profil" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-8 rounded-lg text-lg shadow-xl transition duration-300 transform hover:scale-105">
                Jelajahi Lebih Lanjut
            </a>
        </div>

        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex space-x-3">
            <template x-for="i in slides.length" :key="i">
                <button @click="activeSlide = i; clearInterval(autoplay); loop();" 
                        :class="{'bg-white w-6': activeSlide === i, 'bg-white/50 w-3': activeSlide !== i}" 
                        class="h-3 rounded-full hover:bg-white transition-all duration-300"></button>
            </template>
        </div>
    </div>

    @if ($pendaftaranAktif)
    <section class="bg-blue-600 text-white">
        <div class="container mx-auto py-6 px-6 text-center">
            <h2 class="text-2xl font-bold mb-2">Pendaftaran Santri Baru Telah Dibuka: {{ $pendaftaranAktif->nama_periode }}!</h2>
            <p class="text-blue-200 mb-4">Periode: {{ $pendaftaranAktif->tanggal_mulai->format('d M') }} - {{ $pendaftaranAktif->tanggal_selesai->format('d M Y') }}</p>
            <div class="flex flex-wrap justify-center gap-4">
                @foreach ($pendaftaranAktif->kontakPanitia as $kontak)
                    <a href="https://wa.me/{{ $kontak->nomor_wa }}" target="_blank" class="bg-white hover:bg-gray-100 text-blue-600 font-bold py-2 px-5 rounded-lg shadow-md transition-transform transform hover:scale-105">
                        Hubungi Panitia: {{ $kontak->nama }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    
    <section class="py-24 bg-gray-50">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-sm font-bold uppercase text-blue-500 mb-2">Pendidikan Holistik</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-gray-900 mb-16">Program Unggulan Kami</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse ($programUnggulan as $program)
                <div class="bg-white p-8 rounded-lg shadow-lg text-center transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="bg-blue-100 text-blue-600 w-20 h-20 rounded-full mx-auto flex items-center justify-center mb-6 shadow-inner">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v11.494m-9-5.747h18"></path></svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">{{ $program->nama }}</h3>
                    <p class="text-gray-500 leading-relaxed">{{ Str::limit(strip_tags($program->deskripsi), 100) }}</p>
                </div>
                @empty
                <p class="md:col-span-3 text-gray-500">Program unggulan akan segera ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="py-24">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-sm font-bold uppercase text-blue-500 mb-2">Kabar Terkini</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-gray-900">Berita & Kegiatan Pesantren</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($beritaTerbaru as $berita)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform hover:-translate-y-2 transition-transform duration-300">
                        <a href="{{ route('berita.show', $berita) }}" class="block overflow-hidden">
                            <img src="{{ asset('storage/' . $berita->thumbnail) }}" alt="{{ $berita->judul }}" class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-500">
                        </a>
                        <div class="p-6">
                            <p class="text-sm text-gray-500 mb-2">{{ $berita->created_at->format('d F Y') }}</p>
                            <h3 class="text-xl font-semibold mb-3 text-gray-900 leading-snug h-20">{{ Str::limit(strip_tags($berita->judul), 60) }}</h3>
                            <a href="{{ route('berita.show', $berita) }}" class="text-blue-600 hover:text-blue-700 font-semibold group-hover:text-blue-800 transition-colors">
                                Baca Selengkapnya <span class="group-hover:ml-1 transition-all">&rarr;</span>
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="md:col-span-3 text-center text-gray-500">Belum ada berita untuk ditampilkan.</p>
                @endforelse
            </div>
            <div class="text-center mt-16">
                <a href="{{ route('berita.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition duration-300 transform hover:scale-105">Lihat Semua Berita</a>
            </div>
        </div>
    </section>

    @if($sejarahSingkat)
    <section id="profil" class="py-24 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="lg:pr-8">
                    <h2 class="text-sm font-bold uppercase text-blue-500 mb-2">Profil Pesantren</h2>
                    <h3 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Jejak Langkah & Sejarah Singkat</h3>
                    <div class="text-gray-600 space-y-4 leading-relaxed">
                        {!! Str::limit(strip_tags($sejarahSingkat->konten), 600) !!}
                    </div>
                    <a href="{{ route('tokoh.sejarah.index') }}" class="mt-8 inline-block bg-transparent border-2 border-blue-600 text-blue-600 font-semibold py-3 px-6 rounded-lg hover:bg-blue-600 hover:text-white transition duration-300">
                        Pelajari Sejarah Kami
                    </a>
                </div>
                <div>
                    <img src="https://images.unsplash.com/photo-1618077360395-f3068be8e001?q=80&w=2070&auto=format&fit=crop" alt="Profil Pesantren" class="rounded-xl shadow-2xl w-full">
                </div>
            </div>
        </div>
    </section>
    @endif

    <section class="py-24">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-sm font-bold uppercase text-blue-500 mb-2">Momen Berharga</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-gray-900">Galeri Kegiatan Terbaru</h3>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($galeriTerbaru as $item)
                <a href="{{ route('galeri.index') }}" class="block rounded-xl shadow-lg overflow-hidden group transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="relative">
                        <img src="{{ asset('storage/' . $item->media) }}" alt="{{ $item->judul }}" class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-6">
                            <h3 class="text-white text-xl font-bold">{{ $item->judul }}</h3>
                        </div>
                    </div>
                </a>
                @empty
                    <p class="lg:col-span-3 text-center text-gray-500">Belum ada galeri untuk ditampilkan.</p>
                @endforelse
            </div>
             <div class="text-center mt-16">
                <a href="{{ route('galeri.index') }}" class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition duration-300 transform hover:scale-105">Lihat Semua Galeri</a>
            </div>
        </div>
    </section>

    <section class="py-24 bg-gray-50">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-sm font-bold uppercase text-blue-500 mb-2">Apresiasi</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-gray-900 mb-16">Apa Kata Mereka?</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($testimonis as $testimoni)
                    <div class="bg-white p-8 rounded-lg shadow-lg relative">
                        <div class="absolute top-0 left-8 -translate-y-1/2 text-8xl text-blue-100 opacity-50">&ldquo;</div>
                        <p class="text-gray-600 mb-6 mt-4 italic relative z-10">"{{ $testimoni->kutipan }}"</p>
                        <div class="flex items-center justify-center">
                            <img class="w-14 h-14 rounded-full mr-4 object-cover border-2 border-blue-200" src="{{ $testimoni->foto ? asset('storage/' . $testimoni->foto) : 'https://i.pravatar.cc/150?u=' . $testimoni->id }}" alt="Avatar">
                            <div>
                                <p class="font-semibold text-gray-900">{{ $testimoni->nama }}</p>
                                <p class="text-sm text-gray-500">{{ $testimoni->jabatan }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="md:col-span-3 text-gray-500">Belum ada testimoni untuk ditampilkan.</p>
                @endforelse
            </div>
        </div>
    </section>

    <footer id="kontak" class="bg-gray-900 text-white py-20">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-1">
                    <h3 class="text-xl font-bold mb-4">Pesantren Pusat</h3>
                    <p class="text-gray-400 leading-relaxed">Membentuk generasi Rabbani yang cerdas, mandiri, dan berakhlakul karimah.</p>
                </div>
                <div>
                    <h3 class="font-semibold mb-4 text-gray-200">Navigasi Cepat</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('berita.index') }}" class="text-gray-400 hover:text-white transition-colors">Berita</a></li>
                        <li><a href="{{ route('galeri.index') }}" class="text-gray-400 hover:text-white transition-colors">Galeri</a></li>
                        <li><a href="{{ route('pengurus.index') }}" class="text-gray-400 hover:text-white transition-colors">Struktur Pengurus</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-4 text-gray-200">Tentang Kami</h3>
                    <ul class="space-y-3">
                         <li><a href="{{ route('tokoh.sejarah.index') }}" class="text-gray-400 hover:text-white transition-colors">Sejarah</a></li>
                         <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Visi & Misi</a></li>
                         <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Program & Fasilitas</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-4 text-gray-200">Hubungi Kami</h3>
                    <p class="text-gray-400">Jl. Pendidikan No. 1, Kota Santri</p>
                    <p class="text-gray-400">Email: info@pesantrenpusat.id</p>
                </div>
            </div>
            <div class="mt-16 border-t border-gray-700 pt-8 text-center text-gray-500">
                <p>&copy; {{ date('Y') }} Pesantren Pusat. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

</body>
</html>