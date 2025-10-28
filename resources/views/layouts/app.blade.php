<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="@yield('description', 'Website resmi Pesantren Pusat, pusat pendidikan Islam yang modern dan berintegritas untuk mencetak generasi Qur\'ani.')">
  <meta name="keywords" content="pesantren, pendidikan islam, sekolah islam, pendaftaran santri">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Pesantren Pusat')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>body{font-family:'Poppins',sans-serif}</style>
</head>
<body class="bg-gray-50 text-gray-800">

  <!-- Skip link -->
  <a href="#konten" class="sr-only focus:not-sr-only focus:absolute focus:top-3 focus:left-3 focus:bg-blue-600 focus:text-white focus:px-3 focus:py-1.5 focus:rounded-md text-xs">Loncat ke konten</a>

  <!-- NAVIGATION -->
  <nav
    x-data="navController()"
    x-init="init()"
    :class="wrapperClass"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 ease-in-out will-change-transform">

    <!-- Progress bar opsional -->
    <div
      x-show="showProgress"
      :style="`width:${progress}%;`"
      class="h-0.5 bg-blue-600/70 absolute top-0 left-0 transition-[width] duration-200">
    </div>

    <div class="container mx-auto px-5 md:px-6 py-2.5 md:py-3 flex items-center justify-between"
         :class="barClass">

      <!-- Logo -->
      <a href="{{ route('homepage') }}" class="flex items-center gap-2">
        <img src="{{ asset('img/logo.png') }}" alt="Logo Pesantren" class="h-8 w-8 object-contain">
        <span class="text-lg md:text-xl font-bold text-gray-800">Pesantren Pusat</span>
      </a>

      <!-- Desktop menu -->
      <div class="hidden md:flex items-center gap-5 font-medium text-sm">
        <a href="{{ route('homepage') }}"
           class="nav-link @if(request()->routeIs('homepage')) active @endif">Home</a>
        <a href="{{ route('program.index') }}"
           class="nav-link @if(request()->routeIs('program.*')) active @endif">Program</a>
        <a href="{{ route('berita.index') }}"
           class="nav-link @if(request()->routeIs('berita.*')) active @endif">Berita</a>
        <a href="{{ route('galeri.index') }}"
           class="nav-link @if(request()->routeIs('galeri.*')) active @endif">Galeri</a>
        <a href="{{ route('pengurus.index') }}"
           class="nav-link @if(request()->routeIs('pengurus.*')) active @endif">Struktur</a>
        <a href="{{ route('tokoh.sejarah.index') }}"
           class="nav-link @if(request()->routeIs('tokoh.sejarah.*')) active @endif">Sejarah</a>
        <a href="#kontak" class="ml-1 btn-primary hover:scale-[1.02] transition-transform text-sm">Hubungi Kami</a>
      </div>

      <!-- Mobile button -->
      <button
        @click="toggle()"
        :aria-expanded="open"
        aria-controls="mobile-menu"
        aria-label="Toggle navigasi"
        class="md:hidden inline-flex items-center justify-center w-9 h-9 rounded-md text-gray-800 hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:ring-offset-2 focus:ring-offset-white">
        <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
        <svg x-show="open" x-transition class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </button>
    </div>

    <!-- Mobile menu panel -->
    <div
      id="mobile-menu"
      x-show="open"
      x-transition:enter="transition ease-out duration-250"
      x-transition:enter-start="opacity-0 -translate-y-2"
      x-transition:enter-end="opacity-100 translate-y-0"
      x-transition:leave="transition ease-in duration-200"
      x-transition:leave-start="opacity-100 translate-y-0"
      x-transition:leave-end="opacity-0 -translate-y-2"
      class="md:hidden bg-white/80 backdrop-blur-md shadow-soft rounded-b-xl border-t border-gray-100 absolute top-full left-0 right-0">

      <div class="flex flex-col gap-1.5 py-3 px-5">
        <a href="{{ route('homepage') }}" class="mobile-link @if(request()->routeIs('homepage')) active-mobile @endif">Home</a>
        <a href="{{ route('program.index') }}" class="mobile-link @if(request()->routeIs('program.*')) active-mobile @endif">Program</a>
        <a href="{{ route('berita.index') }}" class="mobile-link @if(request()->routeIs('berita.*')) active-mobile @endif">Berita</a>
        <a href="{{ route('galeri.index') }}" class="mobile-link @if(request()->routeIs('galeri.*')) active-mobile @endif">Galeri</a>
        <a href="{{ route('pengurus.index') }}" class="mobile-link @if(request()->routeIs('pengurus.*')) active-mobile @endif">Struktur</a>
        <a href="{{ route('tokoh.sejarah.index') }}" class="mobile-link @if(request()->routeIs('tokoh.sejarah.*')) active-mobile @endif">Sejarah</a>
        <a href="#kontak" class="mobile-link font-semibold text-blue-600">Hubungi Kami</a>
      </div>
    </div>
  </nav>

  <main id="konten" class="pt-20 md:pt-24">
    @yield('content')
  </main>

  <footer id="kontak" class="bg-gray-900 text-white pt-16 md:pt-20 pb-12">
    <div class="container mx-auto px-6">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-10 md:gap-12 text-sm">
        <div class="md:col-span-1">
          <h3 class="text-xl font-bold mb-3">Pesantren Pusat</h3>
          <p class="text-gray-400 leading-relaxed">Membentuk generasi Rabbani yang cerdas, mandiri, dan berakhlakul karimah.</p>
          <div class="mt-5 flex gap-3">
            <a href="#" class="text-gray-400 hover:text-white transition"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"></svg></a>
            <a href="#" class="text-gray-400 hover:text-white transition"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"></svg></a>
            <a href="#" class="text-gray-400 hover:text-white transition"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"></svg></a>
          </div>
        </div>
        <div>
          <h3 class="font-semibold text-base mb-3 text-gray-200">Navigasi</h3>
          <ul class="space-y-2.5">
            <li><a href="{{ route('berita.index') }}" class="text-gray-400 hover:text-white transition">Berita</a></li>
            <li><a href="{{ route('galeri.index') }}" class="text-gray-400 hover:text-white transition">Galeri</a></li>
            <li><a href="{{ route('pengurus.index') }}" class="text-gray-400 hover:text-white transition">Struktur Pengurus</a></li>
          </ul>
        </div>
        <div>
          <h3 class="font-semibold text-base mb-3 text-gray-200">Tentang Kami</h3>
          <ul class="space-y-2.5">
            <li><a href="{{ route('tokoh.sejarah.index') }}" class="text-gray-400 hover:text-white transition">Sejarah</a></li>
            <li><a href="{{ route('program.index') }}" class="text-gray-400 hover:text-white transition">Program & Fasilitas</a></li>
          </ul>
        </div>
        <div>
          <h3 class="font-semibold text-base mb-3 text-gray-200">Hubungi Kami</h3>
          <p class="text-gray-400">Jl. Pendidikan No. 1, Kota Santri</p>
          <p class="text-gray-400">Email: info@pesantrenpusat.id</p>
        </div>
      </div>
      <div class="mt-12 border-top border-gray-700 pt-6 text-center text-gray-500 text-xs md:text-sm">
        <p>&copy; {{ date('Y') }} Pesantren Pusat. Hak Cipta Dilindungi.</p>
      </div>
    </div>
  </footer>

  <!-- Alpine controller inline -->
  <script>
    function navController() {
      return {
        open: false,
        scrolled: false,
        lastY: 0,
        hidden: false,
        progress: 0,
        showProgress: true, // set false jika tidak ingin progress bar

        init() {
          // Initial state
          this.onScroll();
          window.addEventListener('scroll', () => this.onScroll());
          window.addEventListener('resize', () => this.onScroll());
          // Close menu on ESC
          window.addEventListener('keydown', (e) => { if (e.key === 'Escape') this.open = false; });
        },

        toggle() {
          this.open = !this.open;
          // Saat menu terbuka, paksa elevasi supaya backdrop konsisten
          if (this.open) this.scrolled = true;
        },

        onScroll() {
          const y = window.scrollY || document.documentElement.scrollTop;
          // Blur aktif jika melewati ambang
          this.scrolled = y > 10 || this.open;
          // Hide-on-scroll down, show-on-scroll up
          this.hidden = y > this.lastY && y > 100;
          this.lastY = y;
          // Progress
          const h = document.documentElement;
          const total = h.scrollHeight - h.clientHeight;
          this.progress = total > 0 ? Math.min(100, Math.max(0, (y / total) * 100)) : 0;
        },

        get wrapperClass() {
          const base = this.scrolled ? 'bg-white/70 backdrop-blur-xl shadow-md' : 'bg-transparent';
          const translate = this.hidden ? '-translate-y-full' : 'translate-y-0';
          return `${base} ${translate}`;
        },

        get barClass() {
          return this.scrolled ? 'transition-colors' : 'transition-colors';
        },
      }
    }
  </script>
</body>
</html>
