@extends('layouts.app')

@section('title', 'Jejak Kepemimpinan - Pesantren Pusat')

@section('content')
<header class="bg-gray-100 py-12">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-4xl font-bold text-gray-800">Jejak Kepemimpinan</h1>
        <p class="text-gray-600 mt-2">Menghormati para pendiri dan pimpinan yang telah mendedikasikan hidupnya.</p>
    </div>
</header>

<div class="container mx-auto p-8">
    <div class="max-w-4xl mx-auto space-y-12">
        @forelse ($semuaTokoh as $tokoh)
            <div class="md:flex items-center bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="{{ asset('storage/' . $tokoh->foto) }}" alt="Foto {{ $tokoh->nama }}" class="w-full h-64 md:w-1/3 object-cover">
                <div class="p-8">
                    <h2 class="text-3xl font-bold text-gray-900">{{ $tokoh->nama }}</h2>
                    <p class="text-lg text-blue-500 mb-4 font-semibold">{{ $tokoh->periode_jabatan }}</p>
                    <div class="prose max-w-none text-gray-700">
                        {!! $tokoh->kisah !!}
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-500">Data tokoh dan sejarah akan segera ditampilkan.</p>
        @endforelse
    </div>
</div>
@endsection