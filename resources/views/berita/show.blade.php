@extends('layouts.app')

@section('title', $berita->judul . ' - Pesantren Pusat')
@section('description', Str::limit(strip_tags($berita->isi_konten), 150))

@section('content')
<div class="py-20">
    <div class="container mx-auto px-6 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <div class="lg:col-span-2 bg-white p-8 md:p-10 rounded-2xl border border-gray-200">
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight">{{ $berita->judul }}</h1>
                <p class="mt-4 text-gray-500">
                    Dipublikasikan pada {{ $berita->created_at->format('d F Y') }}
                </p>

                <img src="{{ $berita->gambar_utama ? asset('storage/' . $berita->gambar_utama) : 'https://images.unsplash.com/photo-1457369804613-52c61a468e7d?q=80&w=2070&auto=format&fit=crop' }}" alt="{{ $berita->judul }}" class="w-full rounded-xl my-8">

                <div class="prose max-w-none prose-lg">
                    {!! $berita->isi_konten !!}
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-28">
                    <div class="bg-white p-6 rounded-2xl border border-gray-200">
                        <h3 class="text-xl font-bold text-gray-900 mb-6 border-b border-gray-200 pb-4">Berita Lainnya</h3>
                        <div class="space-y-6">
                            @forelse($latestBerita as $item)
                            <a href="{{ route('berita.show', $item) }}" class="block group">
                                <div class="flex items-start gap-4">
                                    <img src="{{ $item->gambar_utama ? asset('storage/' . $item->gambar_utama) : 'https://images.unsplash.com/photo-1586339949916-3e9457bef6d3?q=80&w=2070&auto=format&fit=crop' }}" class="w-24 h-20 object-cover rounded-lg">
                                    <div>
                                        <h4 class="font-bold text-gray-800 group-hover:text-primary-blue transition-colors leading-tight">{{ $item->judul }}</h4>
                                        <p class="text-sm text-gray-500 mt-1">{{ $item->created_at->format('d M Y') }}</p>
                                    </div>
                                </div>
                            </a>
                            @empty
                            <p class="text-gray-500">Tidak ada berita lainnya.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection