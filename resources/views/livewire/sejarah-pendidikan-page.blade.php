<div>
    <div class="pt-24 pb-20 sm:pt-32 sm:pb-24">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center mb-16 animasi-scroll fade-in-up">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900">Jejak Sejarah Unit Pendidikan</h1>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">Menelusuri kembali perjalanan visi, dedikasi, dan tonggak-tonggak penting dalam pendirian unit pendidikan SMP dan SMA di Pesantren Pusat.</p>
            </div>

            <div class="space-y-16">
                @if($sejarahSmp)
                <section id="sejarah-smp" class="bg-white p-8 md:p-12 rounded-2xl border border-gray-200/80 shadow-lg animasi-scroll fade-in-up">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
                        <div class="lg:col-span-1">
                            <h2 class="text-3xl font-bold text-gray-900">Awal Mula SMP</h2>
                            <p class="mt-3 text-gray-500">Fondasi awal pendidikan formal menengah yang menjadi cikal bakal pengembangan unit pendidikan selanjutnya.</p>
                        </div>
                        <div class="lg:col-span-2 prose max-w-none prose-lg text-gray-600 leading-relaxed">
                            {!! $sejarahSmp !!}
                        </div>
                    </div>
                </section>
                @endif

                @if($sejarahSma)
                <section id="sejarah-sma" class="bg-white p-8 md:p-12 rounded-2xl border border-gray-200/80 shadow-lg animasi-scroll fade-in-up">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
                        <div class="lg:col-span-1">
                            <h2 class="text-3xl font-bold text-gray-900">Langkah Lanjutan: SMA</h2>
                            <p class="mt-3 text-gray-500">Tonggak pengembangan pendidikan ke jenjang yang lebih tinggi untuk mencetak lulusan yang siap bersaing.</p>
                        </div>
                        <div class="lg:col-span-2 prose max-w-none prose-lg text-gray-600 leading-relaxed">
                            {!! $sejarahSma !!}
                        </div>
                    </div>
                </section>
                @endif

                @if(!$sejarahSmp && !$sejarahSma)
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-24 bg-white rounded-xl border border-dashed border-gray-300 animasi-scroll fade-in-up">
                         <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h2 class="mt-4 text-2xl font-bold text-gray-800">Konten Sejarah Belum Tersedia</h2>
                        <p class="mt-2 text-gray-500">Informasi mengenai sejarah unit pendidikan akan segera kami tampilkan di halaman ini.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function initSejarahAnimations() {
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
    }

    document.addEventListener("DOMContentLoaded", initSejarahAnimations);
    document.addEventListener('livewire:navigated', initSejarahAnimations);
</script>
@endpush