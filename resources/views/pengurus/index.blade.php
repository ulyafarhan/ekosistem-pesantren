@extends('layouts.app')

@section('title', 'Struktur Kepengurusan - Pesantren Pusat')
@section('description', 'Kenali para pendidik dan pimpinan yang berdedikasi dalam membimbing dan mengelola Pesantren Pusat.')

@section('content')
<div class="pt-24 pb-20 sm:pt-32 sm:pb-24">
    <div class="container mx-auto px-6 max-w-7xl">
        <div class="text-center mb-16 animasi-scroll fade-in-up">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900">Pilar & Pendidik Kami</h1>
            <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">Kenali individu-individu berdedikasi yang menjadi tulang punggung pendidikan dan pembinaan karakter di Pesantren Pusat.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($pengurus as $index => $p)
                <div class="bg-white rounded-xl border border-gray-200/80 p-8 text-center flex flex-col items-center shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 animasi-scroll fade-in-up"
                     style="transition-delay: {{ ($index % 3) * 100 }}ms;">
                    <img src="{{ $p->foto ? asset('storage/' . $p->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($p->nama_lengkap) . '&color=FFFFFF&background=2563EB&bold=true&size=128' }}" 
                         alt="Foto {{ $p->nama_lengkap }}" 
                         class="w-32 h-32 rounded-full mx-auto object-cover shadow-lg mb-6 ring-4 ring-white">
                    <h3 class="text-2xl font-bold text-gray-900">{{ $p->nama_lengkap }}</h3>
                    <p class="text-primary-blue font-semibold mt-1">{{ $p->jabatan }}</p>
                    @if($p->biografi_singkat)
                        <p class="text-gray-600 mt-4 flex-grow">{{ $p->biografi_singkat }}</p>
                    @endif
                </div>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-24 bg-white rounded-xl border border-dashed border-gray-300 animasi-scroll fade-in-up">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <h2 class="mt-4 text-2xl font-bold text-gray-800">Data Kepengurusan Belum Tersedia</h2>
                    <p class="mt-2 text-gray-500">Informasi mengenai struktur kepengurusan akan segera kami tampilkan di halaman ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('sudah-muncul');
                    observer.unobserve(entry.target);
                }
            });
        }, { 
            threshold: 0.1
        });

        const elementsToAnimate = document.querySelectorAll('.animasi-scroll');
        elementsToAnimate.forEach(el => {
            observer.observe(el);
        });
    });
</script>
@endpush