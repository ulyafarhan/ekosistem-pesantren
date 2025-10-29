@extends('layouts.app')

@section('title', 'Berita & Artikel - Pesantren Pusat')
@section('description', 'Ikuti semua informasi, kegiatan, dan prestasi terkini seputar Pesantren Pusat.')

@section('content')
<div class="py-20">
    <div class="container mx-auto px-6 max-w-7xl">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900">Berita & Artikel</h1>
            <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">Semua informasi, kegiatan, dan prestasi terkini dari keluarga besar Pesantren Pusat.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($beritas as $berita)
                <a href="{{ route('berita.show', $berita) }}" class="block group bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="overflow-hidden">
                        {{-- Menggunakan gambar_utama dan menambahkan gambar default jika kosong --}}
                        <img src="{{ $berita->gambar_utama ? asset('storage/' . $berita->gambar_utama) : 'https://images.unsplash.com/photo-1512820790803-83ca734da794?q=80&w=2098&auto=format&fit=crop' }}" alt="{{ $berita->judul }}" class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6">
                        <p class="text-sm text-gray-500 mb-2">{{ $berita->created_at->format('d F Y') }}</p>
                        <h3 class="text-xl font-bold text-gray-900 group-hover:text-primary-blue transition-colors leading-snug">{{ $berita->judul }}</h3>
                        <p class="mt-2 text-gray-600">{{ Str::limit(strip_tags($berita->isi_konten), 100) }}</p>
                        <div class="mt-4 font-semibold text-primary-blue flex items-center gap-2">
                            Baca Selengkapnya 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L10 8.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" transform="rotate(-90 10 10)"/>
                            </svg>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-24 bg-white rounded-xl border border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-800">Belum Ada Berita</h2>
                    <p class="mt-2 text-gray-500">Saat ini belum ada berita atau artikel yang dipublikasikan.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-16">
            {{ $beritas->links() }}
        </div>
    </div>
</div>
@endsection