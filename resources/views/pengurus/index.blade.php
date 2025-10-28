@extends('layouts.app')

@section('title', 'Struktur Kepengurusan - Pesantren Pusat')

@section('content')
<header class="bg-gray-100 py-12">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-4xl font-bold text-gray-800">Struktur Kepengurusan</h1>
        <p class="text-gray-600 mt-2">Mengenal lebih dekat tim yang berdedikasi di balik layar.</p>
    </div>
</header>

<div class="container mx-auto p-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @forelse ($semuaPengurus as $pengurus)
            <div class="bg-white rounded-lg shadow-lg text-center p-6 transform hover:-translate-y-2 transition-transform duration-300">
                @if($pengurus->foto)
                    <img src="{{ asset('storage/' . $pengurus->foto) }}" alt="Foto {{ $pengurus->nama }}" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-4 border-blue-100">
                @else
                    <div class="w-32 h-32 rounded-full mx-auto mb-4 bg-gray-200 flex items-center justify-center border-4 border-blue-100">
                        <span class="text-gray-500">Foto tidak tersedia</span>
                    </div>
                @endif
                <h3 class="text-xl font-semibold text-gray-900">{{ $pengurus->nama }}</h3>
                <p class="text-blue-500 font-medium">{{ $pengurus->jabatan }}</p>
            </div>
        @empty
             <p class="col-span-full text-center text-gray-500">Data kepengurusan akan segera ditampilkan.</p>
        @endforelse
    </div>

    <div class="mt-12">
        {{ $semuaPengurus->links('vendor.pagination.tailwind') }}
    </div>
</div>
@endsection