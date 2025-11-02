<?php $__env->startSection('title', 'Struktur Kepengurusan - Pesantren Pusat'); ?>
<?php $__env->startSection('description', 'Kenali para pendidik dan pimpinan yang berdedikasi dalam membimbing dan mengelola Pesantren Pusat.'); ?>

<?php $__env->startSection('content'); ?>
<div class="pt-24 pb-20 sm:pt-32 sm:pb-24">
    <div class="container mx-auto px-6 max-w-7xl">
        <div class="text-center mb-16 animasi-scroll fade-in-up">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900">Pilar & Pendidik Kami</h1>
            <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">Kenali individu-individu berdedikasi yang menjadi tulang punggung pendidikan dan pembinaan karakter di Pesantren Pusat.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__empty_1 = true; $__currentLoopData = $pengurus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="bg-white rounded-xl border border-gray-200/80 p-8 text-center flex flex-col items-center shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 animasi-scroll fade-in-up"
                     style="transition-delay: <?php echo e(($index % 3) * 100); ?>ms;">
                    <img src="<?php echo e($p->foto ? asset('storage/' . $p->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($p->nama_lengkap) . '&color=FFFFFF&background=2563EB&bold=true&size=128'); ?>" 
                         alt="Foto <?php echo e($p->nama_lengkap); ?>" 
                         class="w-32 h-32 rounded-full mx-auto object-cover shadow-lg mb-6 ring-4 ring-white">
                    <h3 class="text-2xl font-bold text-gray-900"><?php echo e($p->nama_lengkap); ?></h3>
                    <p class="text-primary-blue font-semibold mt-1"><?php echo e($p->jabatan); ?></p>
                    <?php if($p->biografi_singkat): ?>
                        <p class="text-gray-600 mt-4 flex-grow"><?php echo e($p->biografi_singkat); ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-24 bg-white rounded-xl border border-dashed border-gray-300 animasi-scroll fade-in-up">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <h2 class="mt-4 text-2xl font-bold text-gray-800">Data Kepengurusan Belum Tersedia</h2>
                    <p class="mt-2 text-gray-500">Informasi mengenai struktur kepengurusan akan segera kami tampilkan di halaman ini.</p>
                </div>
            <?php endif; ?>
        </div>
        <div class="mt-12"> 
            <?php echo e($pengurus->links()); ?>

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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ekosistem-pesantren\resources\views/pengurus/index.blade.php ENDPATH**/ ?>