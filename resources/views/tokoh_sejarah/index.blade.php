@extends('layouts.app')

@section('title', 'Sejarah & Tokoh Inspiratif - Pesantren Pusat')
@section('description', 'Menelusuri jejak langkah berdirinya unit pendidikan dan mengenal lebih dekat para tokoh penting di balik warisan Pesantren Pusat.')

@section('content')
<div class="pt-24 pb-20 sm:pt-32 sm:pb-24">
    <div class="container mx-auto px-6 max-w-7xl">
        <div class="text-center mb-16 animasi-scroll fade-in-up">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900">Jejak Sejarah & Tokoh Inspiratif</h1>
            <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">Menghargai warisan, mengenal lebih dekat para tokoh visioner, dan menelusuri sejarah berdirinya unit pendidikan di Pesantren Pusat.</p>
        </div>

        @if($tokohs->isNotEmpty())
        <section id="tokoh" class="mb-20">
            <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center animasi-scroll fade-in-up">Para Tokoh & Pimpinan Terdahulu</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($tokohs as $index => $tokoh)
                    <div class="bg-white rounded-xl border border-gray-200/80 p-6 text-center flex flex-col items-center shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 animasi-scroll fade-in-up"
                         style="transition-delay: {{ ($index % 4) * 100 }}ms;">
                        <img src="{{ $tokoh->foto ? asset('storage/' . $tokoh->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($tokoh->nama_lengkap) . '&color=FFFFFF&background=2563EB&bold=true&size=128' }}" 
                             alt="{{ $tokoh->nama_lengkap }}" 
                             class="w-32 h-32 rounded-full mx-auto mb-5 object-cover shadow-lg ring-4 ring-white">
                        <h3 class="text-xl font-bold text-gray-800">{{ $tokoh->nama_lengkap }}</h3>
                        <p class="text-gray-500 text-sm mt-1">{{ $tokoh->periode_jabatan }}</p>
                    </div>
                @endforeach
            </div>
        </section>
        @endif
        
        <div class="space-y-16">
            @if($sejarahSmp)
            <section id="sejarah-smp" class="bg-white p-8 md:p-12 rounded-2xl border border-gray-200/80 shadow-lg animasi-scroll fade-in-up">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Jejak Langkah: Berdirinya SMP Pesantren Pusat</h2>
                <div class="prose max-w-none prose-lg text-gray-600 leading-relaxed">
                    {!! $sejarahSmp->sejarah_smp !!}
                </div>
            </section>
            @endif

            @if($sejarahSma)
            <section id="sejarah-sma" class="bg-white p-8 md:p-12 rounded-2xl border border-gray-200/80 shadow-lg animasi-scroll fade-in-up">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Tonggak Sejarah: Berdirinya SMA Pesantren Pusat</h2>
                <div class="prose max-w-none prose-lg text-gray-600 leading-relaxed">
                    {!! $sejarahSma->sejarah_sma !!}
                </div>
            </section>
            @endif

            {{-- Pesan jika data sejarah belum ada --}}
            @if(!$sejarahSmp && !$sejarahSma && $tokohs->isEmpty())
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-24 bg-white rounded-xl border border-dashed border-gray-300 animasi-scroll fade-in-up">
                     <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h2 class="mt-4 text-2xl font-bold text-gray-800">Konten Sejarah Belum Tersedia</h2>
                    <p class="mt-2 text-gray-500">Informasi mengenai sejarah unit pendidikan dan tokoh terdahulu akan segera kami tampilkan.</p>
                </div>
            @endif
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
            threshold: 0.1 // Sedikit lebih cepat muncul
        });

        const elementsToAnimate = document.querySelectorAll('.animasi-scroll');
        elementsToAnimate.forEach(el => {
            observer.observe(el);
        });
    });
</script>
@endpush