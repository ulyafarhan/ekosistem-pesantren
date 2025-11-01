<!--[if BLOCK]><![endif]--><?php if($testimonis->isNotEmpty()): ?>
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6 lg:px-8 max-w-7xl">
            <div class="text-center max-w-3xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Apa Kata Mereka</h2>
                <p class="mt-4 text-lg text-gray-600">Kesan dari para alumni, wali santri, dan tokoh masyarakat yang telah menjadi bagian dari perjalanan kami.</p>
            </div>
            <div x-data="{
                    testimonis: <?php echo e($testimonis->toJson()); ?>,
                    active: 0,
                    autoplay: null,
                    start() { this.autoplay = setInterval(() => { this.active = (this.active + 1) % this.testimonis.length; }, 5000); },
                    stop() { clearInterval(this.autoplay); }
                }" x-init="start()" @mouseenter="stop()" @mouseleave="start()" class="mt-16 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="w-full h-80 lg:h-[500px] rounded-2xl overflow-hidden shadow-lg">
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=2070&auto=format&fit=crop" alt="Testimoni" class="w-full h-full object-cover">
                </div>
                <div class="relative">
                    <div class="relative min-h-[250px] overflow-hidden">
                        <template x-for="(item, index) in testimonis" :key="index">
                            <div x-show="active === index"
                                x-transition:enter="transition ease-out duration-500 transform" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0"
                                x-transition:leave="transition ease-in duration-300 transform" x-transition:leave-start="opacity-100 translate-x-0" x-transition:leave-end="opacity-0 -translate-x-8"
                                class="absolute inset-0">
                                <p class="text-xl lg:text-2xl font-medium leading-relaxed text-gray-800" x-text="`“${item.kutipan}”`"></p>
                                <div class="flex items-center mt-8">
                                    <img :src="'/storage/' + item.foto" :alt="item.nama" class="w-16 h-16 rounded-full object-cover shadow-md">
                                    <div class="ml-4">
                                        <p class="font-bold text-gray-900 text-lg" x-text="item.nama"></p>
                                        <p class="text-gray-500" x-text="item.jabatan"></p>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                    <div class="flex space-x-3 mt-8">
                        <template x-for="(item, index) in testimonis" :key="index">
                            <button @click="active = index; stop(); start();" 
                                    :class="{ 'bg-primary-blue w-6': active === index, 'bg-gray-300 w-2.5': active !== index }" 
                                    class="h-2.5 rounded-full hover:bg-primary-blue/70 transition-all duration-300"></button>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]--><?php /**PATH C:\laragon\www\ekosistem-pesantren\resources\views/livewire/testimoni-slider.blade.php ENDPATH**/ ?>