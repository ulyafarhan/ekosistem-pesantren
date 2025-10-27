@extends('layouts.app')

@section('title', $berita->judul)

@section('content')
<div class="container mx-auto p-8">
    <article class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6 md:p-10">
        <header class="mb-8">
            <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 mb-4">{{ $berita->judul }}</h1>
            <p class="text-gray-500">
                {{-- PERBAIKAN: Gunakan nullsafe operator (?->) atau optional() helper --}}
                @if ($berita->user)
                    Oleh <span class="font-semibold">{{ $berita->user->name }}</span> &bull; 
                @endif
                {{ $berita->created_at->format('d F Y') }}
            </p>
        </header>

        @if ($berita->thumbnail)
            <img src="{{ asset('storage/' . $berita->thumbnail) }}" alt="{{ $berita->judul }}" class="w-full rounded-lg shadow-md mb-8">
        @endif
        
        <div class="prose max-w-none text-lg text-gray-700 leading-relaxed">
            {!! $berita->konten !!}
        </div>

        <div class="mt-10 border-t pt-6">
            <a href="{{ route('berita.index') }}" class="text-blue-500 hover:text-blue-600 font-semibold">
                &larr; Kembali ke Daftar Berita
            </a>
        </div>
    </article>
</div>
@endsection