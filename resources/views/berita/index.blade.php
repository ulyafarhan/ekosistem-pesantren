@extends('layouts.app')

@section('title', 'Semua Berita - Pesantren Pusat')

@section('content')
<header class="bg-gray-100 py-12">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-4xl font-bold text-gray-800">Berita & Kegiatan</h1>
        <p class="text-gray-600 mt-2">Ikuti informasi dan kegiatan terbaru dari kami.</p>
    </div>
</header>

<div class="container mx-auto p-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($semuaBerita as $berita)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                <a href="{{ route('berita.show', $berita) }}">
                    @if($berita->thumbnail)
                        <img src="{{ asset('storage/' . $berita->thumbnail) }}" alt="{{ $berita->judul }}" class="w-full h-56 object-cover">
                    @else
                        <div class="w-full h-56 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">Gambar tidak tersedia</span>
                        </div>
                    @endif
                </a>
                <div class="p-6">
                    <p class="text-sm text-gray-500 mb-2">{{ optional($berita->created_at)->format('d F Y') }}</p>
                    <h3 class="text-xl font-semibold mb-3 h-20">{{ Str::limit(strip_tags($berita->judul), 60) }}</h3>
                    <a href="{{ route('berita.show', $berita) }}" class="text-blue-500 hover:text-blue-600 font-semibold">Baca Selengkapnya →</a>
                </div>
            </div>
        @empty
            <p class="md:col-span-3 text-center text-gray-500">Belum ada berita yang dipublikasikan.</p>
        @endforelse
    </div>

    <div class="mt-12">
        {{ $semuaBerita->links('vendor.pagination.tailwind') }}
    </div>
</div>
@endsection