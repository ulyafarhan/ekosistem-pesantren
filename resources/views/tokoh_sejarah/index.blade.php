@extends('layouts.app')

@section('title', 'Sejarah & Tokoh Pendiri - Pesantren Pusat')
@section('description', 'Mengenal lebih dekat jejak langkah, sejarah berdirinya unit pendidikan, dan para tokoh penting di balik Pesantren Pusat.')

@section('content')
<div class="py-20">
    <div class="container mx-auto px-6 max-w-7xl">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900">Sejarah & Tokoh Pendiri</h1>
            <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">Mengenal lebih dekat jejak langkah dan para tokoh di balik perjalanan Pesantren Pusat.</p>
        </div>

        @if($tokohs->isNotEmpty())
        <section id="tokoh" class="mb-20">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Tokoh & Pimpinan Terdahulu</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($tokohs as $tokoh)
                    <div class="text-center">
                        <img src="{{ $tokoh->foto ? asset('storage/' . $tokoh->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($tokoh->nama_lengkap) . '&color=7F9CF5&background=EBF4FF' }}" alt="{{ $tokoh->nama_lengkap }}" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover shadow-lg">
                        <h3 class="text-xl font-bold text-gray-800">{{ $tokoh->nama_lengkap }}</h3>
                        <p class="text-gray-500">{{ $tokoh->periode_jabatan }}</p>
                    </div>
                @endforeach
            </div>
        </section>
        @endif
        
        <div class="space-y-16">
            @if($sejarahSmp)
            <section id="sejarah-smp" class="bg-white p-8 md:p-12 rounded-2xl border border-gray-200">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Sejarah Berdirinya SMP Pesantren Pusat</h2>
                <div class="prose max-w-none prose-lg">
                    {!! $sejarahSmp->sejarah_smp !!}
                </div>
            </section>
            @endif

            @if($sejarahSma)
            <section id="sejarah-sma" class="bg-white p-8 md:p-12 rounded-2xl border border-gray-200">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Sejarah Berdirinya SMA Pesantren Pusat</h2>
                <div class="prose max-w-none prose-lg">
                    {!! $sejarahSma->sejarah_sma !!}
                </div>
            </section>
            @endif
        </div>

    </div>
</div>
@endsection