<?php $__env->startSection('title', $berita->judul . ' - Pesantren Pusat'); ?>
<?php $__env->startSection('description', Str::limit(strip_tags($berita->isi_konten), 150)); ?>

<?php $__env->startSection('content'); ?>
<div class="py-20">
    <div class="container mx-auto px-6 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <div class="lg:col-span-2 bg-white p-8 md:p-10 rounded-2xl border border-gray-200">
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight"><?php echo e($berita->judul); ?></h1>
                <p class="mt-4 text-gray-500">
                    Dipublikasikan pada <?php echo e($berita->created_at->format('d F Y')); ?>

                </p>

                <img src="<?php echo e($berita->gambar_utama ? asset('storage/' . $berita->gambar_utama) : 'https://images.unsplash.com/photo-1457369804613-52c61a468e7d?q=80&w=2070&auto=format&fit=crop'); ?>" alt="<?php echo e($berita->judul); ?>" class="w-full rounded-xl my-8">

                <div class="prose max-w-none prose-lg">
                    <?php echo $berita->isi_konten; ?>

                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-28">
                    <div class="bg-white p-6 rounded-2xl border border-gray-200">
                        <h3 class="text-xl font-bold text-gray-900 mb-6 border-b border-gray-200 pb-4">Berita Lainnya</h3>
                        <div class="space-y-6">
                            <?php $__empty_1 = true; $__currentLoopData = $latestBerita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <a href="<?php echo e(route('berita.show', $item)); ?>" class="block group">
                                <div class="flex items-start gap-4">
                                    <img src="<?php echo e($item->gambar_utama ? asset('storage/' . $item->gambar_utama) : 'https://images.unsplash.com/photo-1586339949916-3e9457bef6d3?q=80&w=2070&auto=format&fit=crop'); ?>" class="w-24 h-20 object-cover rounded-lg">
                                    <div>
                                        <h4 class="font-bold text-gray-800 group-hover:text-primary-blue transition-colors leading-tight"><?php echo e($item->judul); ?></h4>
                                        <p class="text-sm text-gray-500 mt-1"><?php echo e($item->created_at->format('d M Y')); ?></p>
                                    </div>
                                </div>
                            </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p class="text-gray-500">Tidak ada berita lainnya.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ekosistem-pesantren\resources\views/berita/show.blade.php ENDPATH**/ ?>