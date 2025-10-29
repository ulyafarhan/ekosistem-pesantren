

<?php $__env->startSection('title', 'Sejarah & Tokoh Pendiri - Pesantren Pusat'); ?>
<?php $__env->startSection('description', 'Mengenal lebih dekat jejak langkah, sejarah berdirinya unit pendidikan, dan para tokoh penting di balik Pesantren Pusat.'); ?>

<?php $__env->startSection('content'); ?>
<div class="py-20">
    <div class="container mx-auto px-6 max-w-7xl">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900">Sejarah & Tokoh Pendiri</h1>
            <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">Mengenal lebih dekat jejak langkah dan para tokoh di balik perjalanan Pesantren Pusat.</p>
        </div>

        <?php if($tokohs->isNotEmpty()): ?>
        <section id="tokoh" class="mb-20">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Tokoh & Pimpinan Terdahulu</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <?php $__currentLoopData = $tokohs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tokoh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="text-center">
                        <img src="<?php echo e($tokoh->foto ? asset('storage/' . $tokoh->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($tokoh->nama_lengkap) . '&color=7F9CF5&background=EBF4FF'); ?>" alt="<?php echo e($tokoh->nama_lengkap); ?>" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover shadow-lg">
                        <h3 class="text-xl font-bold text-gray-800"><?php echo e($tokoh->nama_lengkap); ?></h3>
                        <p class="text-gray-500"><?php echo e($tokoh->periode_jabatan); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
        <?php endif; ?>
        
        <div class="space-y-16">
            <?php if($sejarahSmp): ?>
            <section id="sejarah-smp" class="bg-white p-8 md:p-12 rounded-2xl border border-gray-200">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Sejarah Berdirinya SMP Pesantren Pusat</h2>
                <div class="prose max-w-none prose-lg">
                    <?php echo $sejarahSmp->sejarah_smp; ?>

                </div>
            </section>
            <?php endif; ?>

            <?php if($sejarahSma): ?>
            <section id="sejarah-sma" class="bg-white p-8 md:p-12 rounded-2xl border border-gray-200">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Sejarah Berdirinya SMA Pesantren Pusat</h2>
                <div class="prose max-w-none prose-lg">
                    <?php echo $sejarahSma->sejarah_sma; ?>

                </div>
            </section>
            <?php endif; ?>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ekosistem-pesantren\resources\views/tokoh_sejarah/index.blade.php ENDPATH**/ ?>