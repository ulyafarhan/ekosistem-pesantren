@extends('layouts.app')

@section('title', 'Pesantren Pusat - Mendidik Generasi Qur\'ani')
@section('description', 'Website resmi Pesantren Pusat, pusat pendidikan Islam yang modern dan berintegritas untuk mencetak generasi Qur\'ani.')

@section('content')
{{-- Wrapper x-data untuk mengelola state modal brosur di seluruh halaman --}}
<div x-data="{ showBrosur: false }">

    <section class="relative bg-white">
        <div class="container mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center min-h-[85vh] py-20 lg:py-0">
                {{-- Kolom Teks --}}
                <div class="text-center lg:text-left">
                    <h1 class="text-4xl lg:text-6xl font-extrabold text-gray-900 leading-tight">
                        Mencetak Generasi Qur'ani, Membangun Peradaban
                    </h1>
                    <p class="mt-6 max-w-xl mx-auto lg:mx-0 text-lg lg:text-xl text-gray-600">
                        Menjadi pusat pendidikan Islam modern yang mengintegrasikan iman, ilmu, dan amal untuk melahirkan pemimpin masa depan.
                    </p>
                    <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#pendaftaran" class="bg-primary-blue text-white font-bold py-4 px-8 rounded-lg hover:bg-primary-blue-dark transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            Daftar Sekarang
                        </a>
                        <a href="#tentang-kami" class="bg-blue-100 text-primary-blue font-bold py-4 px-8 rounded-lg hover:bg-blue-200 transition-all duration-300">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>
                {{-- Kolom Gambar --}}
                <div class="hidden lg:block h-[600px] w-[600px] pt-6">
                    @php
                        $heroImage = $heroSliders->isNotEmpty() ? asset('storage/' . $heroSliders->first()->gambar) : 'https://images.unsplash.com/photo-1594799385012-ce00b234952f?q=80&w=2070&auto=format&fit=crop';
                    @endphp
                    <div class="h-full w-full rounded-3xl bg-cover bg-center shadow-2xl" style="background-image: url('{{ $heroImage }}')"></div>
                </div>
            </div>
        </div>
    </section>

    @if ($pendaftaranAktif)
    <div id="pendaftaran" class="bg-white relative z-10 -mt-12 max-w-6xl mx-auto rounded-2xl shadow-xl p-6 lg:p-8 border border-gray-200/80">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
            <div class="text-center lg:text-left">
                <h3 class="font-bold text-xl lg:text-2xl text-gray-900">Pendaftaran Santri Baru {{ $pendaftaranAktif->tahun_ajaran }} Telah Dibuka!</h3>
                <p class="text-gray-500 mt-1">Periode Pendaftaran: {{ \Carbon\Carbon::parse($pendaftaranAktif->tanggal_buka)->translatedFormat('d F') }} - {{ \Carbon\Carbon::parse($pendaftaranAktif->tanggal_tutup)->translatedFormat('d F Y') }}</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto shrink-0">
                @if($pendaftaranAktif->brosur)
                <button @click="showBrosur = true; document.body.style.overflow = 'hidden';" class="w-full text-center border border-primary-blue text-primary-blue font-semibold px-6 py-3 rounded-lg hover:bg-blue-50 transition-colors">
                    Lihat Brosur
                </button>
                @endif
                <a href="https://wa.me/{{ $pendaftaranAktif->kontakPanitia->first()->nomor_wa ?? '' }}" target="_blank" class="w-full text-center bg-primary-blue text-white font-semibold px-6 py-3 rounded-lg hover:bg-primary-blue-dark transition-colors shadow-md hover:shadow-lg">
                    Hubungi Panitia
                </a>
            </div>
        </div>
    </div>
    @endif

    <section id="tentang-kami" class="py-24">
        <div class="container mx-auto px-6 lg:px-8 max-w-7xl">
            <div
                x-data="statisticsCounter(@json($statistics ?? []))"
                @intersect.once="start()"
                class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center"
            >
                {{-- Kolom Teks (dengan animasi) --}}
                <div x-show="started"
                    x-transition:enter="transition ease-out duration-1000"
                    x-transition:enter-start="opacity-0 -translate-x-8"
                    x-transition:enter-end="opacity-100 translate-x-0">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Pendidikan Holistik untuk Masa Depan Bangsa</h2>
                    <p class="mt-6 text-lg leading-relaxed text-gray-600">
                        Kami berkomitmen menyediakan pendidikan yang tidak hanya unggul dalam akademik dan keagamaan, tetapi juga dalam pembentukan karakter. Dengan memadukan kurikulum modern dan nilai-nilai Islam, kami bertujuan membentuk santri yang berakhlak mulia, mandiri, dan siap menjadi pemimpin di masa depan.
                    </p>
                </div>

                {{-- Kolom Angka (dengan animasi dari controller) --}}
                <div class="grid grid-cols-2 gap-6">
                    <template x-for="(stat, index) in items" :key="index">
                        <div class="bg-white p-6 rounded-2xl border border-gray-200/80 text-center"
                            x-show="started"
                            x-transition:enter="transition ease-out duration-500"
                            :style="`transition-delay: ${index * 150}ms`"
                            x-transition:enter-start="opacity-0 scale-90"
                            x-transition:enter-end="opacity-100 scale-100">
                            <span class="text-4xl font-extrabold text-primary-blue">
                                <span x-text="stat.value"></span><span x-text="stat.suffix"></span>
                            </span>
                            <p class="mt-2 font-semibold text-gray-600" x-text="stat.label"></p>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="container mx-auto px-6 lg:px-8 max-w-7xl">
            <div class="text-center max-w-3xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Program Unggulan Kami</h2>
                <p class="mt-4 text-lg text-gray-600">Fokus kami pada tiga pilar utama untuk menciptakan pendidikan yang komprehensif dan relevan dengan zaman.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-16">
                <div class="bg-gray-50 p-8 rounded-2xl border border-gray-200/80">
                    <h3 class="text-xl font-bold text-gray-900">Kurikulum Terintegrasi</h3>
                    <p class="mt-2 text-gray-600">Memadukan kurikulum nasional dengan program Diniyah, Tahfidz, dan bahasa asing (Arab & Inggris) secara seimbang.</p>
                </div>
                <div class="bg-gray-50 p-8 rounded-2xl border border-gray-200/80">
                    <h3 class="text-xl font-bold text-gray-900">Pengembangan Karakter</h3>
                    <p class="mt-2 text-gray-600">Fokus pada pembinaan akhlakul karimah, kemandirian, kepemimpinan, dan jiwa kewirausahaan melalui kegiatan harian.</p>
                </div>
                <div class="bg-gray-50 p-8 rounded-2xl border border-gray-200/80">
                    <h3 class="text-xl font-bold text-gray-900">Lingkungan Modern & Global</h3>
                    <p class="mt-2 text-gray-600">Membiasakan santri dengan wawasan internasional, teknologi, dan mempersiapkan mereka untuk masa depan.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24">
    <div class="container mx-auto px-6 lg:px-8 max-w-7xl">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12">
            <div class="mb-6 md:mb-0">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Kabar & Kegiatan Terbaru</h2>
                <p class="mt-2 text-lg text-gray-600">Ikuti perkembangan dan prestasi terbaru dari Pesantren Pusat.</p>
            </div>
            <a href="{{ route('berita.index') }}" class="bg-blue-100 text-primary-blue font-semibold px-6 py-3 rounded-lg hover:bg-blue-200 transition-colors shrink-0">
                Lihat Semua Berita
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($beritaTerbaru as $berita)
            <a href="{{ route('berita.show', $berita) }}" class="block group bg-white rounded-xl border border-gray-200/80 overflow-hidden hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300">
                
                {{-- PERBAIKAN: Menggunakan kelas aspect ratio modern --}}
                <div class="aspect-[16/9] overflow-hidden">
                    <img src="{{ asset('storage/' . $berita->gambar_utama) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>

                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-primary-blue transition-colors">{{ $berita->judul }}</h3>
                    <p class="mt-2 text-gray-600 line-clamp-3">{{ Str::limit(strip_tags($berita->isi_konten), 120) }}</p>
                </div>
            </a>
            @empty
            <p class="md:col-span-3 text-center text-gray-500 py-10">Belum ada berita untuk ditampilkan.</p>
            @endforelse
        </div>
    </div>
</section>

    @if($testimonis->isNotEmpty())
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6 lg:px-8 max-w-7xl">
            <div class="text-center max-w-3xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Apa Kata Mereka</h2>
                <p class="mt-4 text-lg text-gray-600">Kesan dari para alumni, wali santri, dan tokoh masyarakat yang telah menjadi bagian dari perjalanan kami.</p>
            </div>
            <div x-data="{
                    testimonis: {{ $testimonis->toJson() }},
                    active: 0,
                    autoplay: null,
                    start() { this.autoplay = setInterval(() => { this.active = (this.active + 1) % this.testimonis.length; }, 5000); },
                    stop() { clearInterval(this.autoplay); }
                }" x-init="start()" @mouseenter="stop()" @mouseleave="start()" class="mt-16 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="w-full h-80 lg:h-[500px] rounded-2xl overflow-hidden shadow-lg">
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=2070&auto=format&fit=crop" alt="Testimoni" class="w-full h-full object-cover">
                </div>
                <div class="relative">
                    <div class="relative min-h-[250px] overflow-hidden">
                        <template x-for="(item, index) in testimonis" :key="index">
                            <div x-show="active === index"
                                x-transition:enter="transition ease-out duration-500 transform" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0"
                                x-transition:leave="transition ease-in duration-300 transform" x-transition:leave-start="opacity-100 translate-x-0" x-transition:leave-end="opacity-0 -translate-x-8"
                                class="absolute inset-0">
                                <p class="text-xl lg:text-2xl font-medium leading-relaxed text-gray-800" x-text="`“${item.kutipan}”`"></p>
                                <div class="flex items-center mt-8">
                                    <img :src="'/storage/' + item.foto" :alt="item.nama" class="w-16 h-16 rounded-full object-cover shadow-md">
                                    <div class="ml-4">
                                        <p class="font-bold text-gray-900 text-lg" x-text="item.nama"></p>
                                        <p class="text-gray-500" x-text="item.jabatan"></p>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                    <div class="flex space-x-3 mt-8">
                        <template x-for="(item, index) in testimonis" :key="index">
                            <button @click="active = index; stop(); start();" 
                                    :class="{ 'bg-primary-blue w-6': active === index, 'bg-gray-300 w-2.5': active !== index }" 
                                    class="h-2.5 rounded-full hover:bg-primary-blue/70 transition-all duration-300"></button>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <section class="py-24">
    <div class="container mx-auto px-6 lg:px-8 max-w-7xl">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12">
            <div class="mb-6 md:mb-0">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Momen Kegiatan</h2>
                <p class="mt-2 text-lg text-gray-600">Potret berbagai kegiatan dan momen berharga di pesantren.</p>
            </div>
            <a href="{{ route('galeri.index') }}" class="bg-blue-100 text-primary-blue font-semibold px-6 py-3 rounded-lg hover:bg-blue-200 transition-colors shrink-0">
                Lihat Semua Galeri
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($galeriTerbaru as $item)
                @php
                    // Logika untuk mendapatkan URL media yang benar
                    $media = is_array($item->file_media) ? $item->file_media[0] : $item->file_media;
                    $isExternal = filter_var($media, FILTER_VALIDATE_URL);
                    $mediaUrl = $isExternal ? $media : asset('storage/' . $media);

                    // Ambil thumbnail YouTube jika ini adalah video YouTube
                    if ($item->tipe == 'video' && !$isExternal) {
                        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $media, $matches);
                        $youtubeId = $matches[1] ?? null;
                        if ($youtubeId) {
                            $mediaUrl = "https://img.youtube.com/vi/{$youtubeId}/hqdefault.jpg";
                        }
                    }
                @endphp
                <a href="{{ route('galeri.index') }}" class="block group relative rounded-xl border border-gray-200/80 overflow-hidden aspect-[4/3] hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300">
                    <img src="{{ $mediaUrl }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <h3 class="text-xl font-bold text-white">{{ $item->judul }}</h3>
                    </div>
                    @if($item->tipe == 'video')
                        <div class="absolute inset-0 flex items-center justify-center">
                             <div class="w-16 h-16 bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center text-white group-hover:scale-110 transition-transform">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 ml-1" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" /></svg>
                            </div>
                        </div>
                    @endif
                </a>
            @empty
                <p class="sm:col-span-2 lg:col-span-3 text-center text-gray-500 py-10">Belum ada item galeri untuk ditampilkan.</p>
            @endforelse
        </div>
    </div>
</section>

    <section class="py-24">
        <div class="container mx-auto px-6 lg:px-8 max-w-7xl">
            <div class="bg-primary-blue rounded-2xl p-12 lg:p-20 text-center text-white relative overflow-hidden">
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/10 rounded-full opacity-50"></div>
                <div class="absolute -bottom-16 -left-10 w-52 h-52 bg-white/10 rounded-full opacity-50"></div>
                <div class="relative">
                    <h2 class="text-3xl md:text-4xl font-bold">Mari Bergabung & Menjadi Bagian dari Kami</h2>
                    <p class="mt-4 max-w-2xl mx-auto text-lg text-blue-100">Mulailah perjalanan pendidikan yang akan mengubah hidup Anda. Hubungi kami untuk informasi lebih lanjut.</p>
                    <a href="#kontak" class="mt-8 inline-block bg-white text-primary-blue font-bold py-4 px-10 rounded-lg text-lg hover:bg-blue-50 transition-colors shadow-lg hover:scale-105 transform duration-300">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

    @if ($pendaftaranAktif && $pendaftaranAktif->brosur)
    <div x-show="showBrosur" 
        @keydown.escape.window="showBrosur = false; document.body.style.overflow = 'auto';" 
        class="fixed inset-0 bg-black/70 backdrop-blur-sm z-[99] flex items-center justify-center p-4" 
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        style="display: none;">

        <div @click.away="showBrosur = false; document.body.style.overflow = 'auto';"
            class="bg-white w-full max-w-4xl max-h-[90vh] rounded-2xl shadow-xl flex flex-col"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
            
            {{-- Header Modal --}}
            <div class="p-5 border-b border-gray-200 flex justify-between items-center shrink-0">
                <h2 class="text-xl font-bold text-gray-900">Brosur Pendaftaran {{ $pendaftaranAktif->tahun_ajaran }}</h2>
                <button @click="showBrosur = false; document.body.style.overflow = 'auto';" class="text-gray-400 hover:text-gray-800 text-3xl leading-none">&times;</button>
            </div>
            
            {{-- Konten Scrollable dengan Latar Belakang Berbeda --}}
            <div class="p-6 lg:p-8 overflow-y-auto space-y-6 bg-gray-50">
                @php $brosur = $pendaftaranAktif->brosur; @endphp
                
                {{-- Kartu Visi & Misi --}}
                @if($brosur->visi_misi)
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200/80">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-blue-100 text-primary-blue p-2 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg></div>
                        <h3 class="text-xl font-bold text-gray-800">Visi & Misi</h3>
                    </div>
                    <div class="prose prose-lg max-w-none text-gray-700">
                        @include('partials._render_content', ['contentJson' => $brosur->visi_misi])
                    </div>
                </div>
                @endif

                {{-- Kartu Syarat Pendaftaran --}}
                @if($brosur->syarat_pendaftaran)
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200/80">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-blue-100 text-primary-blue p-2 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg></div>
                        <h3 class="text-xl font-bold text-gray-800">Syarat Pendaftaran</h3>
                    </div>
                    <div class="prose prose-lg max-w-none text-gray-700">
                        @include('partials._render_content', ['contentJson' => $brosur->syarat_pendaftaran])
                    </div>
                </div>
                @endif

                {{-- Kartu Rincian Biaya --}}
                @if($brosur->biaya)
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200/80">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-blue-100 text-primary-blue p-2 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" /></svg></div>
                        <h3 class="text-xl font-bold text-gray-800">Rincian Biaya</h3>
                    </div>
                    <div class="prose prose-lg max-w-none text-gray-700">
                        @include('partials._render_content', ['contentJson' => $brosur->biaya])
                    </div>
                </div>
                @endif

                {{-- Kartu Kurikulum --}}
                @if($brosur->kurikulum_formal)
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200/80">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-blue-100 text-primary-blue p-2 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v11.494m-9-5.747h18" /></svg></div>
                        <h3 class="text-xl font-bold text-gray-800">Kurikulum</h3>
                    </div>
                    <div class="prose prose-lg max-w-none text-gray-700">
                        @include('partials._render_content', ['contentJson' => $brosur->kurikulum_formal])
                    </div>
                </div>
                @endif

                {{-- Kartu Sejarah --}}
                @if($brosur->sejarah)
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200/80">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-blue-100 text-primary-blue p-2 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 14l9-5-9-5-9 5 9 5z" /><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" /><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" /></svg></div>
                        <h3 class="text-xl font-bold text-gray-800">Sejarah Singkat</h3>
                    </div>
                    <div class="prose prose-lg max-w-none text-gray-700">
                        @include('partials._render_content', ['contentJson' => $brosur->sejarah])
                    </div>
                </div>
                @endif
            </div>
            
            {{-- Footer Modal --}}
            <div class="p-5 bg-gray-100 border-t border-gray-200 text-right rounded-b-2xl shrink-0">
                <button @click="showBrosur = false; document.body.style.overflow = 'auto';" class="bg-primary-blue text-white font-semibold px-6 py-2.5 rounded-lg hover:bg-primary-blue-dark transition-colors">Tutup</button>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('statisticsCounter', (initialStats = []) => ({
            started: false,
            items: initialStats.map(stat => ({ ...stat, value: 0 })),

            start() {
                this.started = true;
                this.animateCounters();
            },

            animateCounters() {
                this.items.forEach((stat) => {
                    const target = stat.target;
                    if (typeof target === 'undefined') return;

                    const duration = 1500;
                    const stepTime = 20;
                    const totalSteps = duration / stepTime;
                    const increment = target / totalSteps;
                    let current = 0;

                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            clearInterval(timer);
                            stat.value = target;
                        } else {
                            stat.value = Math.ceil(current);
                        }
                    }, stepTime);
                });
            }
        }));
    });
</script>
@endpush