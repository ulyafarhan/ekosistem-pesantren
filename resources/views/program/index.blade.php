@extends('layouts.app')

@section('title', 'Program & Fasilitas - Pesantren Pusat')

@section('content')
<header class="bg-gray-100 py-12">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-4xl font-bold text-gray-800">Program & Fasilitas</h1>
        <p class="text-gray-600 mt-2">Menyediakan lingkungan belajar yang lengkap dan modern.</p>
    </div>
</header>

<div class="container mx-auto p-8">
    <section class="mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Program Unggulan</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($semuaProgram as $program)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $program->program_pendidikan }}</h3>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500">Data program unggulan akan segera ditampilkan.</p>
            @endforelse
        </div>
        <div class="mt-8">
            {{ $semuaProgram->links('vendor.pagination.tailwind') }}
        </div>
    </section>

    <hr class="my-12 border-gray-200">

    <section>
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Fasilitas Pesantren</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($semuaFasilitas as $fasilitas)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $fasilitas->fasilitas }}</h3>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500">Data fasilitas akan segera ditampilkan.</p>
            @endforelse
        </div>
        <div class="mt-8">
            {{ $semuaFasilitas->links('vendor.pagination.tailwind') }}
        </div>
    </section>
</div>
@endsection