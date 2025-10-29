

<?php $__env->startSection('title', 'Program & Fasilitas - Pesantren Pusat'); ?>
<?php $__env->startSection('description', 'Jelajahi program pendidikan unggulan dan fasilitas modern yang kami sediakan untuk mendukung proses belajar mengajar santri.'); ?>

<?php $__env->startSection('content'); ?>
<div class="py-20">
    <div class="container mx-auto px-6 max-w-7xl">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900">Program & Fasilitas</h1>
            <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">Mendukung pendidikan holistik dengan kurikulum unggulan dan lingkungan belajar yang modern serta representatif.</p>
        </div>

        <?php if($data): ?>
            <section id="program" class="mb-20">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="order-2 lg:order-1">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">Program Pendidikan</h2>
                        <div class="prose max-w-none">
                            <?php echo $data->program_pendidikan; ?>

                        </div>
                    </div>
                    <div class="order-1 lg:order-2">
                        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=2070&auto=format&fit=crop" alt="Program Pendidikan" class="rounded-2xl shadow-xl w-full h-full object-cover">
                    </div>
                </div>
            </section>

            <section id="fasilitas">
                 <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <img src="https://images.unsplash.com/photo-1583413498385-39722a0a5525?q=80&w=2070&auto=format&fit=crop" alt="Fasilitas Pesantren" class="rounded-2xl shadow-xl w-full h-full object-cover">
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">Fasilitas Unggulan</h2>
                        <div class="prose max-w-none">
                            <?php echo $data->fasilitas; ?>

                        </div>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <div class="text-center py-24 bg-white rounded-xl border border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800">Konten Belum Tersedia</h2>
                <p class="mt-2 text-gray-500">Informasi mengenai program dan fasilitas akan segera kami tampilkan.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ekosistem-pesantren\resources\views/program/index.blade.php ENDPATH**/ ?>