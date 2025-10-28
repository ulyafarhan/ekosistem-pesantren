@extends('layouts.app')

@section('title', 'Pesantren Pusat - Mendidik Generasi Qur\'ani')
@section('description', 'Website resmi Pesantren Pusat, pusat pendidikan Islam yang modern dan berintegritas untuk mencetak generasi Qur\'ani.')

@section('content')
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
            init() { this.loop(); }
        }"
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
            <p class="text-blue-200 mb-4">
                Periode: {{ \Carbon\Carbon::parse($pendaftaranAktif->tanggal_mulai)->format('d M') }} - {{ \Carbon\Carbon::parse($pendaftaranAktif->tanggal_selesai)->format('d M Y') }}
            </p>
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
                                Baca Selengkapnya <span class="group-hover:ml-1 transition-all">→</span>
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

    @if($tokohTerkemuka->isNotEmpty())
    <section class="py-24 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-sm font-bold uppercase text-blue-500 mb-2">Figur Inspiratif</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-gray-900">Tokoh & Sejarah Pesantren</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($tokohTerkemuka as $tokoh)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden text-center group">
                    <img src="{{ asset('storage/' . $tokoh->foto) }}" alt="Foto {{ $tokoh->nama_lengkap }}" class="w-full h-80 object-cover object-top">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900">{{ $tokoh->nama_lengkap }}</h3>
                        <p class="text-sm text-blue-600 font-semibold">{{ $tokoh->periode_jabatan }}</p>
                        <p class="text-gray-500 mt-3 h-24">{{ Str::limit(strip_tags($tokoh->kisah_historis), 120) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-16">
                <a href="{{ route('tokoh.sejarah.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition duration-300 transform hover:scale-105">Lihat Semua Tokoh</a>
            </div>
        </div>
    </section>
    @endif

    <section class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="bg-blue-600 rounded-2xl shadow-xl text-white p-12 text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Siap Menjadi Bagian dari Kami?</h2>
                <p class="text-blue-200 max-w-2xl mx-auto mb-8">Mari bergabung dengan keluarga besar Pesantren Pusat dan mulailah perjalanan pendidikan yang akan mengubah hidup Anda.</p>
                @if ($pendaftaranAktif)
                    <a href="https://wa.me/{{ $pendaftaranAktif->kontakPanitia->first()->nomor_wa ?? '' }}" target="_blank" class="bg-white text-blue-600 font-bold py-3 px-8 rounded-lg text-lg shadow-lg transition duration-300 transform hover:scale-105 inline-block">
                        Daftar Sekarang
                    </a>
                @else
                    <span class="bg-white text-blue-600 font-bold py-3 px-8 rounded-lg text-lg shadow-lg inline-block opacity-50 cursor-not-allowed">
                        Pendaftaran Belum Dibuka
                    </span>
                @endif
            </div>
        </div>
    </section>
@endsection