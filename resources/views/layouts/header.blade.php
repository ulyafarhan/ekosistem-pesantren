<header x-data="{ mobileMenuOpen: false, aboutDropdownOpen: false }"
    @keydown.escape.window="mobileMenuOpen = false; aboutDropdownOpen = false"
    x-init="window.addEventListener('close-menus', () => { mobileMenuOpen = false; aboutDropdownOpen = false })"
    class="bg-white/80 backdrop-blur-lg sticky top-0 z-50 border-b border-gray-200/80 transition-all duration-300">
    <nav class="container mx-auto px-6 py-4 max-w-7xl">
        <div class="flex items-center justify-between">
            <a href="{{ route('homepage') }}" class="flex items-center gap-3">
                <img src="{{ asset('img/logo.png') }}" alt="Logo Pesantren" class="h-10 w-10 object-contain"> 
                <span class="text-xl font-bold text-gray-900">Pesantren Pusat</span>
            </a>

            <div class="hidden lg:flex items-center gap-x-8 text-gray-600 font-semibold">
                <a href="{{ route('homepage') }}" wire:navigate
                    class="hover:text-primary-blue transition-colors @if ($isHome) active-nav-link @endif">Home</a>
                <a href="{{ route('program.index') }}" wire:navigate
                    class="hover:text-primary-blue transition-colors @if ($isProgram) active-nav-link @endif">Program</a>
                <a href="{{ route('berita.index') }}" wire:navigate
                    class="hover:text-primary-blue transition-colors @if ($isBerita) active-nav-link @endif">Berita</a>
                <a href="{{ route('galeri.index') }}" wire:navigate
                    class="hover:text-primary-blue transition-colors @if ($isGaleri) active-nav-link @endif">Galeri</a>
                
                <div @mouseenter="aboutDropdownOpen = true" @mouseleave="aboutDropdownOpen = false" class="relative">
                    <button class="flex items-center gap-1 hover:text-primary-blue transition-colors @if ($isTentang) active-nav-link @endif">
                        Tentang Kami
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-5 h-5 transition-transform duration-300"
                            :class="{ 'rotate-180': aboutDropdownOpen }">
                            <path fill-rule="evenodd"
                                d="M5.22 8.22a.75.75 0 011.06 0L10 11.94l3.72-3.72a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.22 9.28a.75.75 0 010-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="aboutDropdownOpen" x-cloak
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-2"
                        class="absolute top-full mt-3 w-56 bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                        <a href="{{ route('pengurus.index') }}" wire:navigate
                            class="block px-5 py-3 text-gray-800 hover:bg-gray-50 hover:text-primary-blue transition-colors">Struktur
                            Pengurus</a>
                        <a href="{{ route('tokoh.sejarah.index') }}" wire:navigate
                            class="block px-5 py-3 text-gray-800 hover:bg-gray-50 hover:text-primary-blue transition-colors">Tokoh Dan Sejarah</a>
                    </div>
                </div>
                <a href="#kontak" class="hover:text-primary-blue transition-colors">Kontak</a>
            </div>

            <div class="hidden lg:block">
                <a href="/admin"
                    class="bg-primary-blue text-white font-semibold px-6 py-2.5 rounded-lg hover:bg-primary-blue-dark transition-colors shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                    Login Admin
                </a>
            </div>

            <div class="lg:hidden"> 
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <div x-show="mobileMenuOpen" x-cloak class="lg:hidden"
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4">
        <div class="p-6 space-y-3 border-t border-gray-200/80">
            <a href="{{ route('homepage') }}" wire:navigate @click="mobileMenuOpen = false"
                class="block px-4 py-2 rounded-md font-semibold hover:bg-gray-100">Home</a>
            <a href="{{ route('program.index') }}" wire:navigate @click="mobileMenuOpen = false"
                class="block px-4 py-2 rounded-md font-semibold hover:bg-gray-100">Program</a>
            <a href="{{ route('berita.index') }}" wire:navigate @click="mobileMenuOpen = false"
                class="block px-4 py-2 rounded-md font-semibold hover:bg-gray-100">Berita</a>
            <a href="{{ route('galeri.index') }}" wire:navigate @click="mobileMenuOpen = false"
                class="block px-4 py-2 rounded-md font-semibold hover:bg-gray-100">Galeri</a>

            <div x-data="{ aboutMobileOpen: false }">
                <button @click="aboutMobileOpen = !aboutMobileOpen" 
                        class="w-full flex justify-between items-center px-4 py-2 rounded-md font-semibold hover:bg-gray-100">
                    Tentang Kami
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" 
                        class="w-5 h-5 transition-transform duration-300" :class="{ 'rotate-180': aboutMobileOpen }">
                        <path fill-rule="evenodd"
                            d="M5.22 8.22a.75.75 0 011.06 0L10 11.94l3.72-3.72a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.22 9.28a.75.75 0 010-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="aboutMobileOpen" x-cloak class="pl-6 mt-2 space-y-2">
                    <a href="{{ route('pengurus.index') }}" wire:navigate @click="mobileMenuOpen = false"
                        class="block px-4 py-2 rounded-md font-semibold hover:bg-gray-100">Struktur Pengurus</a>
                    <a href="{{ route('tokoh.sejarah.index') }}" wire:navigate @click="mobileMenuOpen = false"
                        class="block px-4 py-2 rounded-md font-semibold hover:bg-gray-100">Tokoh Dan Sejarah</a>
                </div>
            </div>

            <a href="#kontak" @click="mobileMenuOpen = false"
                class="block px-4 py-2 rounded-md font-semibold hover:bg-gray-100">Kontak</a>

            <a href="/admin" @click="mobileMenuOpen = false"
                class="block w-full text-center bg-primary-blue text-white font-semibold px-6 py-3 rounded-lg hover:bg-primary-blue-dark transition-colors">
                Login Admin
            </a>
        </div>
    </div>
</header>