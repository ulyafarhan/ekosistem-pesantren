@extends('layouts.app')

@section('content')
<div class="bg-white py-12">
    <div class="container mx-auto px-6">
        <h1 class="text-4xl font-bold text-center mb-4">Berita & Artikel</h1>
        <p class="text-center text-gray-500 mb-12">Semua informasi dan kegiatan terkini seputar Pesantren Digital.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($beritas as $berita)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $berita->thumbnail) }}" alt="{{ $berita->judul }}" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <span class="text-sm text-gray-500">{{ $berita->created_at->format('d M Y') }}</span>
                        <h3 class="font-bold text-xl my-2">{{ $berita->judul }}</h3>
                        <p class="text-gray-600 text-base mb-4">{{ Str::limit(strip_tags($berita->isi), 100) }}</p>
                        <a href="{{ route('berita.show', $berita) }}" class="text-green-700 font-semibold hover:underline">Baca Selengkapnya</a>
                    </div>
                </div>
            @empty
                <p class="col-span-3 text-center text-gray-500 py-16">Saat ini belum ada berita yang tersedia.</p>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $beritas->links() }}
        </div>
    </div>
</div>
@endsection