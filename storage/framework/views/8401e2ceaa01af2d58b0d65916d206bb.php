<?php $__env->startSection('title', 'Pesantren Pusat - Membentuk Pemimpin Masa Depan Berakhlak Qur\'ani'); ?>
<?php $__env->startSection('description', 'Selamat datang di Pesantren Pusat, institusi pendidikan Islam terdepan yang berdedikasi untuk mencetak generasi pemimpin yang berintegritas, cerdas, dan berlandaskan Al-Qur\'an.'); ?>

<?php $__env->startSection('content'); ?>
<div x-data="{ showBrosur: false }">

    <section class="relative bg-white pt-1 mt-[-100px]">
        <div class="container mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-x-16 items-center pt-24 pb-20 sm:pt-32 sm:pb-24">

                <div class="text-center lg:text-left animasi-scroll fade-in-up lg:order-1">
                    <h1 class="text-4xl lg:text-6xl font-extrabold text-gray-900 leading-tight">
                        Membentuk Karakter Qur'ani, Meraih Masa Depan Gemilang
                    </h1>
                    <p class="mt-6 max-w-xl mx-auto lg:mx-0 text-lg lg:text-xl text-gray-600">
                        Kami mengintegrasikan keunggulan akademik dengan nilai-nilai Islam yang luhur untuk melahirkan generasi pemimpin yang siap menjawab tantangan zaman.
                    </p>
                    <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#pendaftaran" class="bg-primary-blue text-white font-bold py-4 px-8 rounded-lg hover:bg-primary-blue-dark transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            Mulai Pendaftaran
                        </a>
                        <a href="#pilar-pendidikan" class="bg-blue-100 text-primary-blue font-bold py-4 px-8 rounded-lg hover:bg-blue-200 transition-all duration-300">
                            Eksplorasi Kami
                        </a>
                    </div>
                </div>

                <div class="w-full max-w-lg mx-auto lg:max-w-none h-[300px] sm:h-[400px] lg:h-[550px] mt-16 lg:mt-0 animasi-scroll fade-in-up lg:order-2">
                    <?php
                        $heroGambar = $heroSliders->isNotEmpty() ? $heroSliders->first()->gambar : null;
                        $heroImage = $heroGambar ? asset('storage/' . $heroGambar) : 'https://images.unsplash.com/photo-1594799385012-ce00b234952f?q=80&w=2070&auto-format&fit=crop';
                    ?>
                    <div class="h-full w-full rounded-3xl bg-cover bg-center shadow-2xl" style="background-image: url('<?php echo e($heroImage); ?>')"></div>
                </div> 
            </div>
        </div>
    </section>
    
    <?php if($pendaftaranAktif): ?>
    <div id="pendaftaran"
        class="relative z-10 -mt-12 sm:-mt-16 px-4 sm:px-6 lg:px-8">
        <div class="bg-white max-w-3xl sm:max-w-4xl lg:max-w-6xl mx-auto rounded-2xl shadow-lg sm:shadow-xl 
                    p-6 sm:p-8 lg:p-10 border border-gray-200/80 animasi-scroll fade-in-up">
            
            <div class="flex flex-col gap-6 sm:gap-8 lg:flex-row lg:items-center lg:justify-between">
                <!-- Teks -->
                <div class="text-center lg:text-left space-y-2">
                    <h3 class="font-bold text-lg sm:text-xl lg:text-2xl text-gray-900 leading-snug">
                        Gerbang Masa Depan Telah Dibuka: Pendaftaran <?php echo e($pendaftaranAktif->tahun_ajaran); ?>

                    </h3>
                    <p class="text-gray-500 text-sm sm:text-base">
                        Periode Pendaftaran:
                        <?php echo e(\Carbon\Carbon::parse($pendaftaranAktif->tanggal_buka)->translatedFormat('d F')); ?>

                        -
                        <?php echo e(\Carbon\Carbon::parse($pendaftaranAktif->tanggal_tutup)->translatedFormat('d F Y')); ?>

                    </p>
                </div>

                <!-- Tombol -->
                <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                    <?php if($pendaftaranAktif->brosur): ?>
                    <button
                        @click="showBrosur = true; document.body.style.overflow = 'hidden';"
                        class="w-full sm:w-auto text-center border border-primary-blue text-primary-blue font-semibold 
                            px-5 py-3 rounded-lg hover:bg-blue-50 active:scale-[0.98] 
                            transition-all duration-200 ease-out">
                        Lihat Brosur Digital
                    </button>
                    <?php endif; ?>

                    <a href="https://wa.me/<?php echo e($pendaftaranAktif->kontakPanitia->first()->nomor_wa ?? ''); ?>"
                    target="_blank"
                    class="w-full sm:w-auto text-center bg-primary-blue text-white font-semibold 
                            px-5 py-3 rounded-lg hover:bg-primary-blue-dark active:scale-[0.98] 
                            transition-all duration-200 ease-out shadow-md hover:shadow-lg">
                        Hubungi Panitia
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <section id="tentang-kami" class="py-24">
        <div class="container mx-auto px-6 lg:px-8 max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="animasi-scroll fade-in-left">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Fondasi Pendidikan Holistik untuk Generasi Unggul</h2>
                    <p class="mt-6 text-lg leading-relaxed text-gray-600">
                        Kami percaya pendidikan sejati melampaui batas ruang kelas. Di sini, kami menempa setiap santri untuk tidak hanya cemerlang dalam akademis dan religius, tetapi juga kokoh dalam karakter. Melalui perpaduan kurikulum modern dan kearifan nilai Islam, kami melahirkan calon pemimpin yang berakhlak mulia, mandiri, dan berwawasan global.
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-6 animasi-scroll fade-in-right" style="transition-delay: 200ms;">
                    <?php $__currentLoopData = $statistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white p-6 rounded-2xl border border-gray-200/80 text-center shadow-sm">
                            <span class="text-4xl font-extrabold text-primary-blue stat-number" 
                                  data-target="<?php echo e($stat['target']); ?>" 
                                  data-final-display="<?php echo e($stat['display']); ?>">
                                0
                            </span>
                            <p class="mt-2 font-semibold text-gray-600"><?php echo e($stat['label']); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>

    <section id="pilar-pendidikan" class="py-24 bg-white">
        <div class="container mx-auto px-6 lg:px-8 max-w-7xl">
            <div class="text-center max-w-3xl mx-auto animasi-scroll fade-in-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Pilar Pendidikan Unggulan Kami</h2>
                <p class="mt-4 text-lg text-gray-600">Tiga pilar fundamental yang menjadi landasan kami dalam menciptakan ekosistem pendidikan yang komprehensif dan relevan.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-16">
                <div class="bg-gray-50 p-8 rounded-2xl border border-gray-200/80 animasi-scroll fade-in-up">
                    <h3 class="text-xl font-bold text-gray-900">Kurikulum Terintegrasi</h3>
                    <p class="mt-2 text-gray-600">Sinergi antara kurikulum nasional, program Diniyah, Tahfidz, serta penguasaan bahasa Arab & Inggris secara seimbang.</p>
                </div>
                <div class="bg-gray-50 p-8 rounded-2xl border border-gray-200/80 animasi-scroll fade-in-up" style="transition-delay: 150ms;">
                    <h3 class="text-xl font-bold text-gray-900">Pembentukan Karakter Adab</h3>
                    <p class="mt-2 text-gray-600">Menanamkan akhlakul karimah, kemandirian, kepemimpinan, dan jiwa kewirausahaan dalam setiap aspek kehidupan santri.</p>
                </div>
                <div class="bg-gray-50 p-8 rounded-2xl border border-gray-200/80 animasi-scroll fade-in-up" style="transition-delay: 300ms;">
                    <h3 class="text-xl font-bold text-gray-900">Wawasan Global & Teknologi</h3>
                    <p class="mt-2 text-gray-600">Mempersiapkan santri menjadi warga dunia yang adaptif dengan membekali wawasan internasional dan literasi digital.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24">
    <div class="container mx-auto px-6 lg:px-8 max-w-7xl">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 animasi-scroll fade-in-up">
            <div class="mb-6 md:mb-0">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Jendela Informasi & Inspirasi</h2>
                <p class="mt-2 text-lg text-gray-600">Selami lebih dalam setiap kegiatan, pencapaian, dan kisah inspiratif dari keluarga besar Pesantren Pusat.</p>
            </div>
            <a href="<?php echo e(route('berita.index')); ?>" class="bg-blue-100 text-primary-blue font-semibold px-6 py-3 rounded-lg hover:bg-blue-200 transition-colors shrink-0">
                Lihat Semua Berita
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__empty_1 = true; $__currentLoopData = $beritaTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <a href="<?php echo e(route('berita.show', $berita)); ?>" class="block group bg-white rounded-xl border border-gray-200/80 overflow-hidden hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 animasi-scroll fade-in-up" style="transition-delay: <?php echo e($index * 150); ?>ms;">
                <div class="aspect-[16/9] overflow-hidden">
                    <img src="<?php echo e(asset('storage/' . $berita->gambar_utama)); ?>" alt="<?php echo e($berita->judul); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-primary-blue transition-colors"><?php echo e($berita->judul); ?></h3>
                    <p class="mt-2 text-gray-600 line-clamp-3"><?php echo e(Str::limit(strip_tags($berita->isi_konten), 120)); ?></p>
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="md:col-span-3 text-center text-gray-500 py-10 animasi-scroll fade-in-up">Saat ini belum ada berita untuk ditampilkan.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('testimoni-slider', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1820672188-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    
    <section class="py-24">
        <div class="container mx-auto px-6 lg:px-8 max-w-7xl">
            <div class="bg-primary-blue rounded-2xl p-12 lg:p-20 text-center text-white relative overflow-hidden animasi-scroll zoom-in">
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/10 rounded-full opacity-50"></div>
                <div class="absolute -bottom-16 -left-10 w-52 h-52 bg-white/10 rounded-full opacity-50"></div>
                <div class="relative">
                    <h2 class="text-3xl md:text-4xl font-bold">Jadilah Bagian dari Perjalanan Kami</h2>
                    <p class="mt-4 max-w-2xl mx-auto text-lg text-blue-100">Ambil langkah pertama menuju pendidikan transformatif yang akan membentuk masa depan. Hubungi kami untuk informasi lebih lanjut.</p>
                    <a href="#kontak"
                        class="mt-8 inline-block bg-white text-primary-blue font-semibold py-4 px-10 rounded-xl text-lg shadow-md
                                transition-all duration-300 ease-in-out hover:bg-blue-50 hover:shadow-xl hover:scale-[1.03] hover:-translate-y-1">
                        Hubungi Tim Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    <?php if($pendaftaranAktif && $pendaftaranAktif->brosur): ?>
        <div x-show="showBrosur" 
            @keydown.escape.window="showBrosur = false; document.body.style.overflow = 'auto';" 
            class="fixed inset-0 bg-black/70 backdrop-blur-sm z-[99] flex items-center justify-center p-4" 
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            x-cloak>

            <div @click.away="showBrosur = false; document.body.style.overflow = 'auto';"
                class="bg-white w-full max-w-4xl max-h-[90vh] rounded-2xl shadow-xl flex flex-col"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                
                <div class="p-5 border-b border-gray-200 flex justify-between items-center shrink-0">
                    <h2 class="text-xl font-bold text-gray-900">Brosur Pendaftaran <?php echo e($pendaftaranAktif->tahun_ajaran); ?></h2>
                    <button @click="showBrosur = false; document.body.style.overflow = 'auto';" class="text-gray-400 hover:text-gray-800 text-3xl leading-none">&times;</button>
                </div>
                
                <div class="p-6 lg:p-8 overflow-y-auto space-y-6 bg-gray-50 hide-scrollbar">
                    <?php $brosur = $pendaftaranAktif->brosur; ?>
                    
                    <?php if($brosur->visi_misi): ?>
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200/80">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="bg-blue-100 text-primary-blue p-2 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg></div>
                            <h3 class="text-xl font-bold text-gray-800">Visi & Misi</h3>
                        </div>
                        <div class="prose prose-lg max-w-none text-gray-700">
                            <?php echo $__env->make('partials._render_content', ['contentJson' => $brosur->visi_misi], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if($brosur->syarat_pendaftaran): ?>
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200/80">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="bg-blue-100 text-primary-blue p-2 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg></div>
                            <h3 class="text-xl font-bold text-gray-800">Syarat Pendaftaran</h3>
                        </div>
                        <div class="prose prose-lg max-w-none text-gray-700">
                            <?php echo $__env->make('partials._render_content', ['contentJson' => $brosur->syarat_pendaftaran], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if($brosur->biaya): ?>
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200/80">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="bg-blue-100 text-primary-blue p-2 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" /></svg></div>
                            <h3 class="text-xl font-bold text-gray-800">Rincian Biaya</h3>
                        </div>
                        <div class="prose prose-lg max-w-none text-gray-700">
                            <?php echo $__env->make('partials._render_content', ['contentJson' => $brosur->biaya], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if($brosur->kurikulum_formal): ?>
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200/80">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="bg-blue-100 text-primary-blue p-2 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v11.494m-9-5.747h18" /></svg></div>
                            <h3 class="text-xl font-bold text-gray-800">Kurikulum</h3>
                        </div>
                        <div class="prose prose-lg max-w-none text-gray-700">
                            <?php echo $__env->make('partials._render_content', ['contentJson' => $brosur->kurikulum_formal], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if($brosur->sejarah): ?>
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200/80">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="bg-blue-100 text-primary-blue p-2 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 14l9-5-9-5-9 5 9 5z" /><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" /><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" /></svg></div>
                            <h3 class="text-xl font-bold text-gray-800">Sejarah Singkat</h3>
                        </div>
                        <div class="prose prose-lg max-w-none text-gray-700">
                            <?php echo $__env->make('partials._render_content', ['contentJson' => $brosur->sejarah], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                
                <div class="p-5 bg-gray-100 border-t border-gray-200 text-right rounded-b-2xl shrink-0">
                    <button @click="showBrosur = false; document.body.style.overflow = 'auto';" class="bg-primary-blue text-white font-semibold px-6 py-2.5 rounded-lg hover:bg-primary-blue-dark transition-colors">Tutup</button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const animateCounter = (element, target, finalDisplay) => {
            const duration = 2000;
            let startTime = null;
            function animation(currentTime) {
                if (startTime === null) startTime = currentTime;
                const elapsedTime = currentTime - startTime;
                const progress = Math.min(elapsedTime / duration, 1);
                element.innerHTML = Math.floor(progress * target);
                if (progress < 1) {
                    requestAnimationFrame(animation);
                } else {
                    element.innerHTML = finalDisplay;
                }
            }
            requestAnimationFrame(animation);
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('sudah-muncul');
                    
                    const numberElements = entry.target.querySelectorAll('.stat-number');
                    if (numberElements.length > 0) {
                        numberElements.forEach(el => {
                            if (el.dataset.animated) return;
                            el.dataset.animated = 'true';

                            const target = parseInt(el.dataset.target, 10);
                            const finalDisplay = el.dataset.finalDisplay;
                            animateCounter(el, target, finalDisplay);
                        });
                    }
                    
                    observer.unobserve(entry.target);
                }
            });
        }, { 
            threshold: 0.15
        });

        const elementsToAnimate = document.querySelectorAll('.animasi-scroll');
        elementsToAnimate.forEach(el => {
            observer.observe(el);
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ekosistem-pesantren\resources\views/homepage.blade.php ENDPATH**/ ?>