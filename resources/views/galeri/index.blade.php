@extends('layouts.app')

@section('content')
<div class="bg-gray-50 pt-24 pb-16">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800">Galeri Kegiatan</h1>
            <p class="text-gray-500 mt-2">Momen-momen berharga dalam perjalanan pendidikan di pesantren.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
             @forelse ($galeris as $g)
                <div class="overflow-hidden rounded-lg group">
                    <img class="h-auto max-w-full rounded-lg hover:scale-105 transition-transform duration-300 cursor-pointer" src="{{ asset('storage/' . $g->media_path) }}" alt="{{ $g->judul }}">
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500 py-16">Belum ada foto di galeri.</p>
            @endforelse
        </div>
        
        <div class="mt-16">
            {{ $galeris->links() }}
        </div>
    </div>
</div>
@endsection