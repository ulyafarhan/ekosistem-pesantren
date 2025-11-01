@extends('layouts.app')

@section('title', 'Galeri Pesantren')
@section('description', 'Kumpulan dokumentasi kegiatan dan fasilitas di pesantren kami.')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-8 text-center">
        Galeri Kegiatan & Fasilitas
    </h1>

    <div x-data="{ open: false, imageUrl: '' }">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse ($galeris as $galeri)
                <div class="overflow-hidden rounded-lg shadow-lg cursor-pointer group"
                     @click="imageUrl = '{{ asset('storage/' . $galeri->gambar) }}'; open = true">
                    <img
                        src="{{ asset('storage/' . $galeri->gambar) }}"
                        alt="{{ $galeri->judul }}"
                        class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300 ease-in-out">
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500">
                    Belum ada gambar di galeri.
                </p>
            @endforelse
        </div>

        <div x-show="open"
             @keydown.escape.window="open = false"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75 p-4" x-cloak>

            <div @click.away="open = false" class="relative max-w-4xl max-h-full mx-auto">
                <img :src="imageUrl" alt="Tampilan Penuh" class="rounded-lg shadow-xl object-contain h-auto" style="max-height: 90vh;">
                <button @click="open = false" class="absolute -top-4 -right-4 h-10 w-10 bg-white rounded-full text-gray-800 flex items-center justify-center text-2xl">&times;</button>
            </div>
        </div>
    </div>

    <div class="mt-12">
        {{ $galeris->links() }}
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('sudah-muncul');
                    observer.unobserve(entry.target);
                }
            });
        }, { 
            threshold: 0.1
        });

        const elementsToAnimate = document.querySelectorAll('.animasi-scroll');
        elementsToAnimate.forEach(el => {
            observer.observe(el);
        });
    });
</script>
@endpush