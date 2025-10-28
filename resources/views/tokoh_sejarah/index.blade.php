@extends('layouts.app')

@section('content')
<div class="bg-gray-50 pt-24 pb-16">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800">Sejarah & Tokoh Pendiri</h1>
            <p class="text-gray-500 mt-2">Mengenal lebih dekat jejak langkah dan para tokoh di balik Pesantren Pusat.</p>
        </div>

        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Tokoh & Pimpinan</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse ($tokohs as $tokoh)
                    <div class="text-center p-4">
                        <img src="{{ asset('storage/' . $tokoh->foto) }}" alt="{{ $tokoh->nama }}" class="w-40 h-40 rounded-full mx-auto mb-4 object-cover shadow-lg">
                        <h3 class="text-xl font-bold text-gray-800">{{ $tokoh->nama }}</h3>
                        <p class="text-gray-500">{{ $tokoh->periode_jabatan }}</p>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-500">Data tokoh sejarah belum tersedia.</p>
                @endforelse
            </div>
        </div>

        <div class="space-y-12">
            @if($sejarahSmp)
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Sejarah SMP Pesantren Pusat</h2>
                <div class="prose max-w-none text-gray-600">
                    {!! $sejarahSmp->konten !!}
                </div>
            </div>
            @endif

            @if($sejarahSma)
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Sejarah SMA Pesantren Pusat</h2>
                <div class="prose max-w-none text-gray-600">
                    {!! $sejarahSma->konten !!}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection