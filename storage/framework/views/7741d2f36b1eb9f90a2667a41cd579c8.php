<?php $__env->startSection('title', 'Galeri Kegiatan - Pesantren Pusat'); ?>
<?php $__env->startSection('description', 'Selami momen-momen berharga dalam perjalanan pendidikan, kegiatan santri, dan berbagai acara inspiratif di Pesantren Pusat.'); ?>

<?php $__env->startSection('content'); ?>
<div x-data="{
    showModal: false,
    modalImage: '',
    modalTitle: '',
    openModal(image, title) {
        this.modalImage = image;
        this.modalTitle = title;
        this.showModal = true;
        document.body.style.overflow = 'hidden';
    },
    closeModal() {
        this.showModal = false;
        document.body.style.overflow = 'auto';
    }
}">
    <div class="pt-24 pb-20 sm:pt-32 sm:pb-24">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center mb-16 animasi-scroll fade-in-up">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900">Galeri Momen & Kegiatan</h1>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">Abadikan setiap jejak inspiratif dari perjalanan pendidikan, kebersamaan santri, dan ragam acara di Pesantren Pusat.</p>
            </div>

            <?php
                $photos = $galeris->where('tipe', 'foto');
                $videos = $galeris->where('tipe', 'video');
            ?>

            <section id="foto">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 animasi-scroll fade-in-up">Potret Kegiatan</h2>
                <?php if($photos->isNotEmpty()): ?>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                        <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $media = is_array($item->file_media) ? $item->file_media[0] : $item->file_media;
                                $imageUrl = asset('storage/' . $media);
                            ?>
                            <div @click="openModal('<?php echo e($imageUrl); ?>', '<?php echo e(addslashes($item->judul)); ?>')" 
                                 class="group cursor-pointer aspect-w-1 aspect-h-1 relative overflow-hidden rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 animasi-scroll zoom-in"
                                 style="transition-delay: <?php echo e(($index % 4) * 100); ?>ms;">
                                <img src="<?php echo e($imageUrl); ?>" alt="<?php echo e($item->judul); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                                <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <div class="text-center py-16 bg-white rounded-xl border border-gray-200 animasi-scroll fade-in-up">
                        <p class="text-gray-500">Belum ada foto yang ditambahkan ke galeri.</p>
                    </div>
                <?php endif; ?>
            </section>

            <section id="video" class="mt-20">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 animasi-scroll fade-in-up">Kilas Balik Video</h2>
                 <?php if($videos->isNotEmpty()): ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $videoUrl = is_array($item->file_media) ? $item->file_media[0] : $item->file_media;
                                preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $videoUrl, $matches);
                                $youtubeId = $matches[1] ?? null;
                            ?>
                            <a href="<?php echo e($videoUrl); ?>" target="_blank" 
                               class="block group bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 animasi-scroll fade-in-up"
                               style="transition-delay: <?php echo e(($index % 3) * 100); ?>ms;">
                                <div class="relative overflow-hidden aspect-video">
                                    <?php if($youtubeId): ?>
                                        <img src="https://img.youtube.com/vi/<?php echo e($youtubeId); ?>/hqdefault.jpg" alt="<?php echo e($item->judul); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    <?php else: ?>
                                        <div class="w-full h-full bg-gray-800 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" /></svg>
                                        </div>
                                    <?php endif; ?>
                                    <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                                        <div class="w-16 h-16 bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center text-white group-hover:scale-110 transition-transform">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 ml-1" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" /></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-5">
                                    <h3 class="font-bold text-gray-900 leading-tight group-hover:text-primary-blue transition-colors"><?php echo e($item->judul); ?></h3>
                                    <p class="text-sm text-gray-500 mt-1"><?php echo e($item->created_at->format('d F Y')); ?></p>
                                </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <div class="text-center py-16 bg-white rounded-xl border border-gray-200 animasi-scroll fade-in-up">
                        <p class="text-gray-500">Belum ada video yang ditambahkan ke galeri.</p>
                    </div>
                <?php endif; ?>
            </section>
            
            <div class="mt-16 animasi-scroll fade-in-up">
                <?php echo e($galeris->links()); ?>

            </div>
        </div>
    </div>

    <div x-show="showModal" @keydown.escape.window="closeModal()" 
         x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
         x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" 
         class="fixed inset-0 bg-black/80 backdrop-blur-sm z-[99] flex items-center justify-center p-4" x-cloak>
        <div @click.away="closeModal()" class="relative max-w-4xl max-h-full w-full"
             x-show="showModal"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-90"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-90">
            <img :src="modalImage" :alt="modalTitle" class="w-full h-auto object-contain max-h-[85vh] rounded-lg shadow-2xl">
            <p x-text="modalTitle" class="text-white text-center mt-3 text-lg font-semibold tracking-wide"></p>
            <button @click="closeModal()" class="absolute -top-2 -right-2 text-white bg-gray-800/60 hover:bg-gray-800 rounded-full p-2 focus:outline-none transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
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
            threshold: 0.1
        });

        const elementsToAnimate = document.querySelectorAll('.animasi-scroll');
        elementsToAnimate.forEach(el => {
            observer.observe(el);
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ekosistem-pesantren\resources\views/galeri/index.blade.php ENDPATH**/ ?>