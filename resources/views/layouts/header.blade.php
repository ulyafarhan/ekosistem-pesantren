<header 
    x-data="{ mobileMenuOpen: false, aboutDropdownOpen: false }" 
    class="bg-white/80 backdrop-blur-lg sticky top-0 z-50 border-b border-gray-200"
>
    <nav class="container mx-auto px-6 py-4 max-w-7xl">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <a href="{{ route('homepage') }}" class="flex items-center gap-3">
                <img src="{{ asset('img/logo.png') }}" alt="Logo Pesantren" class="h-10 w-10 object-contain">
                <span class="text-xl font-bold text-gray-900">Pesantren Pusat</span>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center gap-x-8 text-gray-600 font-semibold">
                <a href="{{ route('homepage') }}" class="hover:text-primary-blue transition-colors @if(request()->routeIs('homepage')) active-nav-link @endif">Home</a>
                <a href="{{ route('program.index') }}" class="hover:text-primary-blue transition-colors @if(request()->routeIs('program.index')) active-nav-link @endif">Program</a>
                <a href="{{ route('berita.index') }}" class="hover:text-primary-blue transition-colors @if(request()->routeIs('berita.*')) active-nav-link @endif">Berita</a>
                <a href="{{ route('galeri.index') }}" class="hover:text-primary-blue transition-colors @if(request()->routeIs('galeri.index')) active-nav-link @endif">Galeri</a>

                <!-- Dropdown -->
                <div class="relative" 
                    @click="aboutDropdownOpen = true" 
                    @click.away="aboutDropdownOpen = false">
                    
                    <button 
                        @click="aboutDropdownOpen = !aboutDropdownOpen"
                        :aria-expanded="aboutDropdownOpen"
                        class="flex items-center gap-1 nav-link px-3 py-2 rounded-lg hover:bg-primary-blue/10 transition-colors
                        @if(request()->routeIs('pengurus.index') || request()->routeIs('tokoh.sejarah.index')) active-nav-link @endif"
                    >
                        <span>Tentang Kami</span>
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            class="h-4 w-4 transition-transform duration-300" 
                            :class="{'rotate-180': aboutDropdownOpen}" 
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" 
                                d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" 
                                clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div 
                        x-show="aboutDropdownOpen"
                        x-cloak
                        x-transition:enter="transition ease-out duration-200" 
                        x-transition:enter-start="opacity-0 -translate-y-2 scale-95" 
                        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                        x-transition:leave="transition ease-in duration-150" 
                        x-transition:leave-start="opacity-100 translate-y-0 scale-100" 
                        x-transition:leave-end="opacity-0 -translate-y-2 scale-95"
                        class="absolute top-full mt-3 w-56 bg-white/95 backdrop-blur rounded-xl shadow-xl border border-gray-100 overflow-hidden"
                    >
                        <a href="{{ route('pengurus.index') }}" 
                        class="block px-5 py-3 text-gray-700 hover:bg-primary-blue/10 hover:text-primary-blue transition-colors">
                        Struktur Pengurus
                        </a>
                        <a href="{{ route('tokoh.sejarah.index') }}" 
                        class="block px-5 py-3 text-gray-700 hover:bg-primary-blue/10 hover:text-primary-blue transition-colors">
                        Tokoh Sejarah
                        </a>
                    </div>
                </div>

                <a href="#kontak" class="hover:text-primary-blue transition-colors">Kontak</a>
            </div>

            <!-- Desktop Login -->
            <div class="hidden lg:block">
                <a href="/admin" class="bg-primary-blue text-white font-semibold px-6 py-2.5 rounded-lg hover:bg-primary-blue-dark transition-colors">
                    Login Admin
                </a>
            </div>

            <!-- Mobile Toggle -->
            <div class="lg:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" aria-label="Toggle Menu">
                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>
                </button>
            </div>
        </div>


    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-cloak x-transition class="lg:hidden mt-4 space-y-2">
        <a href="{{ route('homepage') }}" 
        @click="mobileMenuOpen = false"
        class="block px-4 py-2 rounded-md font-semibold 
        @if(request()->routeIs('homepage')) bg-gray-100 text-primary-blue 
        @else hover:bg-gray-100 @endif">
        Home
        </a>

        <a href="{{ route('program.index') }}" 
        @click="mobileMenuOpen = false"
        class="block px-4 py-2 rounded-md font-semibold 
        @if(request()->routeIs('program.index')) bg-gray-100 text-primary-blue 
        @else hover:bg-gray-100 @endif">
        Program
        </a>

        <a href="{{ route('berita.index') }}" 
        @click="mobileMenuOpen = false"
        class="block px-4 py-2 rounded-md font-semibold 
        @if(request()->routeIs('berita.*')) bg-gray-100 text-primary-blue 
        @else hover:bg-gray-100 @endif">
        Berita
        </a>

        <a href="{{ route('galeri.index') }}" 
        @click="mobileMenuOpen = false"
        class="block px-4 py-2 rounded-md font-semibold 
        @if(request()->routeIs('galeri.index')) bg-gray-100 text-primary-blue 
        @else hover:bg-gray-100 @endif">
        Galeri
        </a>

        <!-- Dropdown Mobile -->
            <div x-data="{ open: false }" class="px-4">
                <button @click="open = !open" class="w-full flex justify-between items-center py-2 font-semibold hover:bg-gray-100 rounded-md">
                    Tentang Kami
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform" :class="{'rotate-180': open}" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>
                </button>
                <div 
                    x-show="aboutDropdownOpen"
                    x-cloak
                    x-transition
                    class="absolute top-full mt-3 w-60 
                        bg-white/30 backdrop-blur-xl 
                        rounded-2xl shadow-2xl border border-white/20 
                        overflow-hidden"
                >
                    <a href="{{ route('pengurus.index') }}" 
                    class="block px-5 py-3 text-gray-800 hover:bg-white/40 hover:text-primary-blue transition">
                    Struktur Pengurus
                    </a>
                    <a href="{{ route('tokoh.sejarah.index') }}" 
                    class="block px-5 py-3 text-gray-800 hover:bg-white/40 hover:text-primary-blue transition">
                    Tokoh Sejarah
                    </a>
                </div>
            </div>

            <a href="#kontak" 
            @click="mobileMenuOpen = false"
            class="block px-4 py-2 rounded-md font-semibold hover:bg-gray-100">
            Kontak
            </a>

            <a href="/admin" 
            @click="mobileMenuOpen = false"
            class="block w-full text-center bg-primary-blue text-white font-semibold px-6 py-2.5 rounded-lg hover:bg-primary-blue-dark transition-colors mt-2">
            Login Admin
            </a>
        </div>
    </nav>
</header>
