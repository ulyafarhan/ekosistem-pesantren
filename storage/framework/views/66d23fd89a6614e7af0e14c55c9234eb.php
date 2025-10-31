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
                        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=2070&auto=format&fit=crop" alt="Suasana Belajar Santri" class="rounded-2xl shadow-xl w-full h-full object-cover">
                    </div>
                </div>
            </section>

            <section id="fasilitas">
                 <div class="text-center my-20 animasi-scroll fade-in-up">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Fasilitas Modern & Mendukung</h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">Menyediakan lingkungan yang kondusif untuk belajar, beribadah, dan bertumbuh kembang.</p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <?php
                        // Placeholder images. Replace with your actual facility images if available.
                        $facilityImages = [
                            'https://images.unsplash.com/photo-1584486188544-dc2e1417aff1?q=80&w=2070&auto=format&fit=crop',
                            'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2070&auto=format&fit=crop',
                            'https://images.unsplash.com/photo-1542892650-7619c1834b6b?q=80&w=2070&auto=format&fit=crop',
                            'https://images.unsplash.com/photo-1613813524959-e5932569f10a?q=80&w=2070&auto=format&fit=crop',
                        ];
                    ?>

                    <?php $__currentLoopData = $facilityImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="animasi-scroll zoom-in" style="transition-delay: <?php echo e($index * 150); ?>ms;">
                        <img class="h-auto max-w-full rounded-2xl shadow-lg hover:shadow-2xl transition-shadow duration-300" src="<?php echo e($image); ?>" alt="Fasilitas Pesantren <?php echo e($index + 1); ?>">
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="prose max-w-none text-gray-600 leading-relaxed animasi-scroll fade-in-up">
                        <?php echo $data->fasilitas; ?>

                    </div>
                    <div class="h-[400px] lg:h-auto lg:aspect-[4/3] animasi-scroll zoom-in" style="transition-delay: 200ms;">
                        <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?q=80&w=2053&auto=format&fit=crop" alt="Asrama Santri" class="rounded-2xl shadow-xl w-full h-full object-cover">
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