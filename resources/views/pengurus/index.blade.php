@extends('layouts.app')

@section('content')
<div class="bg-white pt-24 pb-16">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Struktur Kepengurusan</h1>
        <p class="text-gray-500 mb-12 max-w-2xl mx-auto">Kenali para pendidik dan pimpinan yang berdedikasi dalam membimbing santri di Pesantren Pusat.</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @forelse ($pengurus as $p)
                <div class="text-center p-4">
                    <img src="{{ asset('storage/' . $p->foto) }}" alt="{{ $p->nama }}" class="w-40 h-40 rounded-full mx-auto mb-4 object-cover shadow-lg transform hover:scale-110 transition-transform duration-300">
                    <h3 class="text-xl font-bold text-gray-800">{{ $p->nama }}</h3>
                    <p class="text-gray-500">{{ $p->jabatan }}</p>
                </div>
            @empty
                 <p class="col-span-4 text-center text-gray-500 py-16">Data pengurus belum tersedia.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection