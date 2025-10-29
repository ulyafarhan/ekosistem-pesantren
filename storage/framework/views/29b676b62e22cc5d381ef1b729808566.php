

<?php $__env->startSection('title', 'Struktur Kepengurusan - Pesantren Pusat'); ?>
<?php $__env->startSection('description', 'Kenali para pendidik dan pimpinan yang berdedikasi dalam membimbing dan mengelola Pesantren Pusat.'); ?>

<?php $__env->startSection('content'); ?>
<div class="py-20">
    <div class="container mx-auto px-6 max-w-7xl">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900">Struktur Kepengurusan</h1>
            <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">Kenali para pendidik dan pimpinan yang berdedikasi dalam membimbing santri di Pesantren Pusat.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__empty_1 = true; $__currentLoopData = $pengurus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="bg-white rounded-xl border border-gray-200 p-8 text-center flex flex-col items-center">
                    <img src="<?php echo e($p->foto ? asset('storage/' . $p->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($p->nama_lengkap) . '&color=7F9CF5&background=EBF4FF'); ?>" alt="Foto <?php echo e($p->nama_lengkap); ?>" class="w-32 h-32 rounded-full mx-auto object-cover shadow-lg mb-6">
                    <h3 class="text-2xl font-bold text-gray-900"><?php echo e($p->nama_lengkap); ?></h3>
                    <p class="text-primary-blue font-semibold mt-1"><?php echo e($p->jabatan); ?></p>
                    <?php if($p->biografi_singkat): ?>
                        <p class="text-gray-600 mt-4 flex-grow"><?php echo e($p->biografi_singkat); ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-24 bg-white rounded-xl border border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-800">Data Belum Tersedia</h2>
                    <p class="mt-2 text-gray-500">Informasi mengenai struktur kepengurusan akan segera kami tampilkan.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ekosistem-pesantren\resources\views/pengurus/index.blade.php ENDPATH**/ ?>