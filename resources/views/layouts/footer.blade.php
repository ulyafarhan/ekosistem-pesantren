<footer id="kontak" class="bg-gray-900 text-gray-400">
    <div class="container mx-auto px-6 py-20 max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            <div class="col-span-1 md:col-span-2 lg:col-span-1">
                <a href="{{ route('homepage') }}" class="flex items-center gap-3">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo Pesantren" class="h-10 w-10 object-contain">
                    <span class="text-xl font-bold text-white">Pesantren Pusat</span>
                </a>
                <p class="mt-4">
                    Membentuk generasi Rabbani yang cerdas, mandiri, dan berakhlakul karimah.
                </p>
            </div>

            <div>
                <h3 class="font-semibold text-white tracking-wider">Navigasi Cepat</h3>
                <ul class="mt-4 space-y-3">
                    <li><a href="{{ route('program.index') }}"
                            class="hover:text-white transition-colors duration-300">Program</a></li>
                    <li><a href="{{ route('berita.index') }}"
                            class="hover:text-white transition-colors duration-300">Berita</a></li>
                    <li><a href="{{ route('galeri.index') }}"
                            class="hover:text-white transition-colors duration-300">Galeri</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold text-white tracking-wider">Tentang Kami</h3>
                <ul class="mt-4 space-y-3">
                    <li><a href="{{ route('tokoh.sejarah.index') }}"
                            class="hover:text-white transition-colors duration-300">Sejarah</a></li>
                    <li><a href="{{ route('pengurus.index') }}"
                            class="hover:text-white transition-colors duration-300">Struktur Pengurus</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold text-white tracking-wider">Hubungi Kami</h3>
                <div class="mt-4 space-y-3">
                    <p>Jl. Pendidikan No. 123,<br>Kota Santri, Indonesia</p>
                    <p>Email: <a href="mailto:info@pesantrenpusat.id"
                            class="hover:text-white transition-colors duration-300">info@pesantrenpusat.id</a></p>
                    <p>Telp: <a href="tel:+62211234567"
                            class="hover:text-white transition-colors duration-300">(021) 123-4567</a></p>
                </div>
            </div>
        </div>
        <div class="mt-16 border-t border-gray-700 pt-8 text-center text-gray-500">
            <p>&copy; {{ date('Y') }} Pesantren Pusat. Seluruh hak cipta dilindungi.</p>
        </div>
    </div>
</footer>