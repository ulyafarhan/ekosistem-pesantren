@extends('layouts.app')

@section('content')
<div class="bg-white pt-24 pb-16">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800">Program & Fasilitas</h1>
            <p class="text-gray-500 mt-2">Mendukung pendidikan holistik dengan program unggulan dan fasilitas modern.</p>
        </div>

        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Program Unggulan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($programs as $program)
                    <div class="bg-gray-50 p-8 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold mb-2 text-gray-900">{{ $program->nama }}</h3>
                        <div class="text-gray-600 prose max-w-none">
                           {!! $program->deskripsi !!}
                        </div>
                    </div>
                @empty
                    <p class="col-span-3 text-center text-gray-500">Program unggulan akan segera ditambahkan.</p>
                @endforelse
            </div>
        </div>

        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Fasilitas Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($fasilitas as $item)
                    <div class="bg-gray-50 p-8 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold mb-2 text-gray-900">{{ $item->nama }}</h3>
                         <div class="text-gray-600 prose max-w-none">
                           {!! $item->deskripsi !!}
                        </div>
                    </div>
                @empty
                    <p class="col-span-3 text-center text-gray-500">Data fasilitas akan segera ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection