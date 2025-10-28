@extends('layouts.app')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="container mx-auto px-6">
        <div class="lg:flex lg:space-x-12">
            <div class="lg:w-2/3 bg-white p-8 rounded-lg shadow-md">
                <h1 class="text-4xl font-bold mb-4">{{ $berita->judul }}</h1>
                <div class="text-gray-500 mb-6">
                    <span>Dipublikasikan pada {{ $berita->created_at->format('d F Y') }}</span>
                </div>
                <img src="{{ asset('storage/' . $berita->thumbnail) }}" alt="{{ $berita->judul }}" class="w-full rounded-lg mb-8">
                <div class="prose max-w-none">
                    {!! $berita->isi !!}
                </div>
            </div>

            <div class="lg:w-1/3 mt-8 lg:mt-0">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold mb-6 border-b pb-4">Berita Lainnya</h3>
                    <ul>
                        @forelse($latestBerita as $item)
                        <li class="mb-4">
                            <a href="{{ route('berita.show', $item) }}" class="flex items-center space-x-4 group">
                                <img src="{{ asset('storage/' . $item->thumbnail) }}" class="w-20 h-20 object-cover rounded-md">
                                <div>
                                    <h4 class="font-semibold group-hover:text-green-700">{{ $item->judul }}</h4>
                                    <span class="text-sm text-gray-500">{{ $item->created_at->format('d M Y') }}</span>
                                </div>
                            </a>
                        </li>
                        @empty
                        <p class="text-gray-500">Tidak ada berita lainnya.</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection