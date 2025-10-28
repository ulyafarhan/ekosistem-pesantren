@extends('layouts.app')

@section('title', 'Galeri Kegiatan - Pesantren Pusat')

@section('content')
<div x-data="{ open: false, imageSrc: '' }">
    <header class="bg-gray-100 py-12">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl font-bold text-gray-800">Galeri Kegiatan</h1>
            <p class="text-gray-600 mt-2">Momen-momen berharga dari kegiatan kami.</p>
        </div>
    </header>

<div class="container mx-auto p-8">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse ($semuaGaleri as $item)
                <div @click="open = true; imageSrc = '{{ asset('storage/' . $item->media) }}'" class="group relative cursor-pointer">
                    @if($item->media)
                        <img src="{{ asset('storage/' . $item->media) }}" alt="{{ $item->judul }}" class="w-full h-64 object-cover rounded-lg shadow-md">
                    @else
                        <div class="w-full h-64 bg-gray-200 flex items-center justify-center rounded-lg shadow-md">
                            <span class="text-gray-500">Gambar tidak tersedia</span>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 flex items-center justify-center p-4">
                        <p class="text-white text-center font-semibold opacity-0 group-hover:opacity-100 transition-opacity">{{ $item->judul }}</p>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500">Belum ada item di galeri.</p>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $semuaGaleri->links('vendor.pagination.tailwind') }}
        </div>
    </div>

    <div x-show="open" @click.away="open = false" @keydown.escape.window="open = false" class="fixed inset-0 bg-black bg-opacity-80 z-50 flex items-center justify-center p-4" style="display: none;">
        <img :src="imageSrc" class="max-w-full max-h-full rounded-lg">
        <button @click="open = false" class="absolute top-4 right-4 text-white text-3xl">&times;</button>
    </div>
</div>
@endsection