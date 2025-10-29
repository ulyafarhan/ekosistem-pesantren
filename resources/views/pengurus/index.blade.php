@extends('layouts.app')

@section('title', 'Struktur Kepengurusan - Pesantren Pusat')
@section('description', 'Kenali para pendidik dan pimpinan yang berdedikasi dalam membimbing dan mengelola Pesantren Pusat.')

@section('content')
<div class="py-20">
    <div class="container mx-auto px-6 max-w-7xl">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900">Struktur Kepengurusan</h1>
            <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">Kenali para pendidik dan pimpinan yang berdedikasi dalam membimbing santri di Pesantren Pusat.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($pengurus as $p)
                <div class="bg-white rounded-xl border border-gray-200 p-8 text-center flex flex-col items-center">
                    <img src="{{ $p->foto ? asset('storage/' . $p->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($p->nama_lengkap) . '&color=7F9CF5&background=EBF4FF' }}" alt="Foto {{ $p->nama_lengkap }}" class="w-32 h-32 rounded-full mx-auto object-cover shadow-lg mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">{{ $p->nama_lengkap }}</h3>
                    <p class="text-primary-blue font-semibold mt-1">{{ $p->jabatan }}</p>
                    @if($p->biografi_singkat)
                        <p class="text-gray-600 mt-4 flex-grow">{{ $p->biografi_singkat }}</p>
                    @endif
                </div>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-24 bg-white rounded-xl border border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-800">Data Belum Tersedia</h2>
                    <p class="mt-2 text-gray-500">Informasi mengenai struktur kepengurusan akan segera kami tampilkan.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection