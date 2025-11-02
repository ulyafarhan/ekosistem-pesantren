<?php $__env->startSection('title', 'Program & Fasilitas - Pesantren Pusat'); ?>
<?php $__env->startSection('description', 'Jelajahi program pendidikan unggulan dan fasilitas modern yang kami sediakan untuk mendukung proses belajar mengajar santri.'); ?>

<?php $__env->startSection('content'); ?>
<div class="pt-24 pb-20 sm:pt-32 sm:pb-24">
    <div class="container mx-auto px-6 max-w-7xl">
        <div class="text-center mb-16 animasi-scroll fade-in-up">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900">Program & Fasilitas Unggulan</h1>
            <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">Kami berkomitmen menyediakan ekosistem pendidikan holistik melalui kurikulum terdepan dan lingkungan belajar yang modern serta representatif.</p>
        </div>

        <?php if($data): ?>
            <section id="program" class="mb-20">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="animasi-scroll fade-in-left">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">Program Pendidikan Terpadu</h2>
                        <div class="prose max-w-none text-gray-600 leading-relaxed">
                            <?php echo $data->program_pendidikan; ?>

                        </div>
                    </div>
                    <div class="h-[400px] lg:h-auto lg:aspect-[4/3] animasi-scroll fade-in-right" style="transition-delay: 200ms;">
                        <?php
                            $programImage = $data->gambar ? asset('storage/' . $data->gambar) : 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=2070&auto-format&fit=crop';
                        ?>
                        <img src="<?php echo e($programImage); ?>" alt="Program Pendidikan Pesantren" class="rounded-2xl shadow-xl w-full h-full object-cover">
                    </div>
                </div>
            </section>

            <section id="fasilitas">
                <div class="text-center my-20 animasi-scroll fade-in-up">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Fasilitas Modern & Mendukung</h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">Menyediakan lingkungan yang kondusif untuk belajar, beribadah, dan bertumbuh kembang.</p>
                </div>

                <?php
                    // Kita butuh 11 gambar untuk layout baru Anda
                    $facilityImages = [
                        ['src' => 'https://images.unsplash.com/photo-1584486188544-dc2e1417aff1?q=80&w=600&auto=format&fit=crop', 'alt' => 'Masjid Pesantren'],
                        ['src' => 'https://images.unsplash.com/photo-1584486188544-dc2e1417aff1?q=80&w=600&auto=format&fit=crop', 'alt' => 'Asrama Santri'],
                        ['src' => 'https://images.unsplash.com/photo-1584486188544-dc2e1417aff1?q=80&w=600&auto=format&fit=crop', 'alt' => 'Ruang Kelas'],
                        ['src' => 'https://images.unsplash.com/photo-1584486188544-dc2e1417aff1?q=80&w=600&auto=format&fit=crop', 'alt' => 'Perpustakaan'],
                        ['src' => 'https://images.unsplash.com/photo-1584486188544-dc2e1417aff1?q=80&w=600&auto=format&fit=crop', 'alt' => 'Aula Pertemuan'],
                        ['src' => 'https://images.unsplash.com/photo-1584486188544-dc2e1417aff1?q=80&w=600&auto=format&fit=crop', 'alt' => 'Laboratorium Komputer'],
                        ['src' => 'https://images.unsplash.com/photo-1584486188544-dc2e1417aff1?q=80&w=600&auto=format&fit=crop', 'alt' => 'Lapangan Olahraga'],
                        ['src' => 'https://images.unsplash.com/photo-1584486188544-dc2e1417aff1?q=80&w=600&auto=format&fit=crop', 'alt' => 'Kantin Sehat'],
                        ['src' => 'https://images.unsplash.com/photo-1584486188544-dc2e1417aff1?q=80&w=600&auto=format&fit=crop', 'alt' => 'Taman Belajar'],
                        ['src' => 'https://images.unsplash.com/photo-1584486188544-dc2e1417aff1?q=80&w=600&auto=format&fit=crop', 'alt' => 'Ekstrakurikuler'],
                        ['src' => 'https://images.unsplash.com/photo-1584486188544-dc2e1417aff1?q=80&w=600&auto=format&fit=crop', 'alt' => 'Ruang Rapat'],
                    ];
                ?>

                <!-- Container utama -->
                <div class="flex flex-wrap gap-3">

                    <!-- Item 1: col-span-2 row-span-2 -->
                    <div class="w-full h-200px flex-shrink-0 basis-[32%] h-[40%] rounded-2xl overflow-hidden shadow-lg transform transition duration-500 ease-out "
                        style="order:1;">
                        <img class="w-full h-full object-cover" src="<?php echo e($facilityImages[0]['src']); ?>" alt="<?php echo e($facilityImages[0]['alt']); ?>">
                    </div>

                    <!-- Item 2: row-span-2 (narrow column) -->
                    <div class="flex-shrink-0 basis-[16%] h-[40%] rounded-2xl overflow-hidden shadow-lg transform transition duration-500 ease-out"
                        style="order:2;">
                        <img class="w-full h-full object-cover" src="<?php echo e($facilityImages[1]['src']); ?>" alt="<?php echo e($facilityImages[1]['alt']); ?>">
                    </div>

                    <!-- Item 3: row-span-3 (tall) -->
                    <div class="flex-shrink-0 basis-[24%] h-[62%] rounded-2xl overflow-hidden shadow-lg transform transition duration-500 ease-out"
                        style="order:3;">
                        <img class="w-full h-full object-cover" src="<?php echo e($facilityImages[2]['src']); ?>" alt="<?php echo e($facilityImages[2]['alt']); ?>">
                    </div>

                    <!-- Item 4: col-span-2 row-span-3 -->
                    <div class="flex-shrink-0 basis-[32%] h-[62%] rounded-2xl overflow-hidden shadow-lg transform transition duration-500 ease-out"
                        style="order:4;">
                        <img class="w-full h-full object-cover" src="<?php echo e($facilityImages[3]['src']); ?>" alt="<?php echo e($facilityImages[3]['alt']); ?>">
                    </div>

                    <!-- Item 5: row-span-3 (left tall) -->
                    <div class="flex-shrink-0 basis-[16%] h-[62%] rounded-2xl overflow-hidden shadow-lg transform transition duration-500 ease-out"
                        style="order:5;">
                        <img class="w-full h-full object-cover" src="<?php echo e($facilityImages[4]['src']); ?>" alt="<?php echo e($facilityImages[4]['alt']); ?>">
                    </div>

                    <!-- Item 6: row-span-3 (right) -->
                    <div class="flex-shrink-0 basis-[24%] h-[62%] rounded-2xl overflow-hidden shadow-lg transform transition duration-500 ease-out"
                        style="order:6;">
                        <img class="w-full h-full object-cover" src="<?php echo e($facilityImages[5]['src']); ?>" alt="<?php echo e($facilityImages[5]['alt']); ?>">
                    </div>

                    <!-- Item 7: row-span-2 (top-right small) -->
                    <div class="flex-shrink-0 basis-[16%] h-[40%] rounded-2xl overflow-hidden shadow-lg transform transition duration-500 ease-out"
                        style="order:7;">
                        <img class="w-full h-full object-cover" src="<?php echo e($facilityImages[6]['src']); ?>" alt="<?php echo e($facilityImages[6]['alt']); ?>">
                    </div>

                    <!-- Item 8: row-span-2 (mid) -->
                    <div class="flex-shrink-0 basis-[24%] h-[40%] rounded-2xl overflow-hidden shadow-lg transform transition duration-500 ease-out"
                        style="order:8;">
                        <img class="w-full h-full object-cover" src="<?php echo e($facilityImages[7]['src']); ?>" alt="<?php echo e($facilityImages[7]['alt']); ?>">
                    </div>

                    <!-- Item 9: row-span-3 (tall rightmost) -->
                    <div class="flex-shrink-0 basis-[16%] h-[62%] rounded-2xl overflow-hidden shadow-lg transform transition duration-500 ease-out"
                        style="order:9;">
                        <img class="w-full h-full object-cover" src="<?php echo e($facilityImages[8]['src']); ?>" alt="<?php echo e($facilityImages[8]['alt']); ?>">
                    </div>

                    <!-- Item 10: row-span-2 (bottom-right) -->
                    <div class="flex-shrink-0 basis-[16%] h-[40%] rounded-2xl overflow-hidden shadow-lg transform transition duration-500 ease-out"
                        style="order:10;">
                        <img class="w-full h-full object-cover" src="<?php echo e($facilityImages[9]['src']); ?>" alt="<?php echo e($facilityImages[9]['alt']); ?>">
                    </div>

                </div>


                
                <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="prose max-w-none text-gray-600 leading-relaxed animasi-scroll fade-in-up">
                        <?php echo $data->fasilitas; ?>

                    </div>
                    <div class="h-[400px] lg:h-auto lg:aspect-[4/3] animasi-scroll zoom-in" style="transition-delay: 200ms;">
                        <?php
                            $fasilitasImage = $data->gambar_fasilitas 
                                                ? asset('storage/' . $data->gambar_fasilitas) 
                                                : 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?q=80&w=2053&auto-format&fit=crop';
                        ?>
                        <img src="<?php echo e($fasilitasImage); ?>" alt="Fasilitas Pesantren" class="rounded-2xl shadow-xl w-full h-full object-cover">
                    </div>
                </div>
            </section>
        <?php else: ?>
            <div class="text-center py-24 bg-white rounded-xl border border-gray-200 animasi-scroll fade-in-up">
                <h2 class="text-2xl font-bold text-gray-800">Konten Belum Tersedia</h2>
                <p class="mt-2 text-gray-500">Informasi mengenai program dan fasilitas akan segera kami tampilkan.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
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
            threshold: 0.15
        });

        const elementsToAnimate = document.querySelectorAll('.animasi-scroll');
        elementsToAnimate.forEach(el => {
            observer.observe(el);
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ekosistem-pesantren\resources\views/program/index.blade.php ENDPATH**/ ?>