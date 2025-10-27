<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ekosistem Pesantren — Properti & Layanan</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800">

  @if ($pendaftaranAktif)
  <div class="bg-amber-100 border-b border-amber-300 text-amber-900">
    <div class="mx-auto max-w-7xl px-4 py-2 text-sm md:text-base flex flex-wrap items-center gap-2 justify-center">
      <span class="font-semibold">Pendaftaran Santri Baru:</span>
      <span>{{ $pendaftaranAktif->nama_periode }} ({{ $pendaftaranAktif->tanggal_mulai->format('d M Y') }} - {{ $pendaftaranAktif->tanggal_selesai->format('d M Y') }})</span>
      <span class="hidden md:inline">•</span>
      <div class="flex gap-2">
        @foreach ($pendaftaranAktif->kontakPanitia as $kontak)
          <a class="inline-flex items-center rounded-full bg-emerald-600 px-3 py-1 text-white hover:bg-emerald-700 transition" target="_blank" href="https://wa.me/{{ $kontak->nomor_wa }}">Hubungi {{ $kontak->nama }}</a>
        @endforeach
      </div>
    </div>
  </div>
  @endif

  <header class="bg-white/80 backdrop-blur supports-[backdrop-filter]:bg-white/60 sticky top-0 z-50 border-b border-slate-100">
    <div class="mx-auto max-w-7xl px-4">
      <div class="flex items-center justify-between py-4">
        <a href="{{ route('homepage') }}" class="flex items-center gap-3">
          <span class="inline-grid place-items-center size-10 rounded-lg bg-gradient-to-br from-sky-500 to-indigo-600 text-white shadow-soft">EP</span>
          <div class="leading-tight">
            <div class="font-bold text-slate-900">Ekosistem Pesantren</div>
            <div class="text-xs text-slate-500">Kolaborasi • Properti • Layanan</div>
          </div>
        </a>

        <nav class="hidden md:flex items-center gap-6">
          <a href="#tentang" class="nav-link">Tentang</a>
          <a href="#katalog" class="nav-link">Katalog</a>
          <a href="#cara-kerja" class="nav-link">Cara Kerja</a>
          <a href="{{ route('berita.index') }}" class="nav-link">Berita</a>
          <a href="{{ route('galeri.index') }}" class="nav-link">Galeri</a>
          <a href="{{ route('pengurus.index') }}" class="nav-link">Pengurus</a>
          <a href="{{ route('tokoh.sejarah.index') }}" class="nav-link">Sejarah</a>
        </nav>

        <button id="mobile-open" class="md:hidden inline-flex items-center rounded-lg px-3 py-2 bg-slate-100 hover:bg-slate-200">
          <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
      </div>
    </div>
    <div id="mobile-menu" class="md:hidden hidden border-t border-slate-100">
      <div class="mx-auto max-w-7xl px-4 py-4 grid gap-2">
        <a href="#tentang" class="mobile-link">Tentang</a>
        <a href="#katalog" class="mobile-link">Katalog</a>
        <a href="#cara-kerja" class="mobile-link">Cara Kerja</a>
        <a href="{{ route('berita.index') }}" class="mobile-link">Berita</a>
        <a href="{{ route('galeri.index') }}" class="mobile-link">Galeri</a>
        <a href="{{ route('pengurus.index') }}" class="mobile-link">Pengurus</a>
        <a href="{{ route('tokoh.sejarah.index') }}" class="mobile-link">Sejarah</a>
      </div>
    </div>
  </header>

  <main class="mx-auto max-w-7xl px-4 md:grid md:grid-cols-[1fr,360px] md:gap-8">
    <div class="py-8">
      <!-- Hero -->
      <section class="reveal rounded-3xl bg-gradient-to-b from-sky-50 to-slate-50 border border-slate-200 p-6 md:p-10 shadow-soft">
        <div class="grid md:grid-cols-2 gap-6 md:gap-10 items-center">
          <div>
            <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight text-slate-900">Properti untuk Bisnis</h1>
            <p class="mt-4 text-slate-600 text-base md:text-lg">Sewa, jual-beli, dan kurasi aset — dari kantor modern hingga gudang dan lahan produktif. Kami mendampingi dari awal hingga selesai.</p>
            <div class="mt-6 flex flex-wrap gap-3">
              <a href="#kontak" class="btn-primary">Mulai Kerja Sama</a>
              <a href="#katalog" class="btn-ghost">Lihat Katalog</a>
            </div>
          </div>
          <div class="relative">
            <img class="rounded-2xl w-full aspect-[4/3] object-cover shadow-xl" src="https://images.unsplash.com/photo-1501594907354-04cfb3d6b9c5?q=80&w=1600&auto=format&fit=crop" alt="Gedung modern" />
            <div class="absolute -bottom-4 -left-4 hidden md:block">
              <div class="badge-glass">Konsultasi Gratis</div>
            </div>
          </div>
        </div>
      </section>

      <!-- Tentang + angka + logo -->
      <section id="tentang" class="reveal mt-12">
        <div class="grid gap-8 md:grid-cols-2 items-start">
          <div class="rounded-2xl bg-white p-6 shadow-soft border border-slate-200">
            <h2 class="section-title">Tentang Kami</h2>
            <p class="mt-2 text-slate-600">Kami ahli dalam pengelolaan dan kurasi properti untuk kebutuhan bisnis. Jaringan luas, proses transparan, dan layanan end-to-end.</p>
            <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-6">
              <div class="stat"><div class="stat-number" data-count-to="10">0</div><div class="stat-label">tahun pengalaman</div></div>
              <div class="stat"><div class="stat-number" data-count-to="1000">0</div><div class="stat-label">asset terkurasi</div></div>
              <div class="stat"><div class="stat-number" data-count-to="4000">0</div><div class="stat-label">m² portofolio</div></div>
              <div class="stat"><div class="stat-number" data-count-to="95">0</div><div class="stat-label">kepuasan klien (%)</div></div>
            </div>
            <div class="mt-6 flex flex-wrap gap-6 opacity-80">
              <div class="logo-pill">Logopipsum</div>
              <div class="logo-pill">Logopipsum</div>
              <div class="logo-pill">Logopipsum</div>
              <div class="logo-pill">Logopipsum</div>
              <div class="logo-pill">Logopipsum</div>
            </div>
          </div>
          <div class="rounded-2xl bg-sky-50/60 p-6 border border-slate-200 shadow-soft">
            <h3 class="font-semibold text-slate-900">Highlight Berita</h3>
            <div class="mt-4 grid gap-3">
              @foreach ($beritaTerbaru as $berita)
                <a href="{{ route('berita.show', $berita) }}" class="group flex items-center gap-4 rounded-xl p-3 hover:bg-sky-100/60">
                  <img class="size-16 rounded-lg object-cover" src="{{ asset('storage/' . $berita->thumbnail) }}" alt="{{ $berita->judul }}">
                  <div>
                    <div class="font-medium text-slate-900 group-hover:text-sky-700">{{ $berita->judul }}</div>
                    <div class="text-xs text-slate-500">Baca selengkapnya →</div>
                  </div>
                </a>
              @endforeach
            </div>
            <a href="{{ route('berita.index') }}" class="mt-4 inline-flex text-sky-700 hover:text-sky-900">Lihat semua berita →</a>
          </div>
        </div>
      </section>

      <!-- Katalog -->
      <section id="katalog" class="reveal mt-12">
        <div class="flex items-end justify-between">
          <h2 class="section-title">Katalog Objek</h2>
          <div class="flex gap-2">
            <button id="catalog-prev" class="slider-btn" aria-label="Sebelumnya">‹</button>
            <button id="catalog-next" class="slider-btn" aria-label="Berikutnya">›</button>
          </div>
        </div>
        <div class="mt-6 overflow-x-auto" id="catalog-container">
          <div class="flex gap-6 min-w-max pr-6" style="scroll-snap-type:x mandatory">
            @foreach ($galeriTerbaru as $item)
              <article class="catalog-card" style="scroll-snap-align:start">
                <img class="h-44 w-full object-cover rounded-xl" src="{{ asset('storage/' . $item->media) }}" alt="{{ $item->judul }}">
                <div class="mt-3 flex items-center justify-between">
                  <div>
                    <h3 class="font-semibold text-slate-900">{{ $item->judul }}</h3>
                    <p class="text-sm text-slate-600">Objek terpilih</p>
                  </div>
                  <a href="{{ route('galeri.index') }}" class="inline-flex items-center gap-1 text-sky-700 hover:text-sky-900">Detail <span aria-hidden>→</span></a>
                </div>
              </article>
            @endforeach
            @if($galeriTerbaru->isEmpty())
              <article class="catalog-card" style="scroll-snap-align:start">
                <img class="h-44 w-full object-cover rounded-xl" src="https://images.unsplash.com/photo-1494526585095-c41746248156?q=80&w=1600&auto=format&fit=crop" alt="Kantor">
                <div class="mt-3 flex items-center justify-between"><div><h3 class="font-semibold">Kantor</h3><p class="text-sm text-slate-600">Ribuan opsi</p></div><span class="text-sky-700">Detail →</span></div>
              </article>
              <article class="catalog-card" style="scroll-snap-align:start">
                <img class="h-44 w-full object-cover rounded-xl" src="https://images.unsplash.com/photo-1600607687923-6f0f13d13cb1?q=80&w=1600&auto=format&fit=crop" alt="Gudang">
                <div class="mt-3 flex items-center justify-between"><div><h3 class="font-semibold">Gudang</h3><p class="text-sm text-slate-600">Banyak pilihan</p></div><span class="text-sky-700">Detail →</span></div>
              </article>
              <article class="catalog-card" style="scroll-snap-align:start">
                <img class="h-44 w-full object-cover rounded-xl" src="https://images.unsplash.com/photo-1525517450344-06ff98a1e0ce?q=80&w=1600&auto=format&fit=crop" alt="Lahan">
                <div class="mt-3 flex items-center justify-between"><div><h3 class="font-semibold">Lahan</h3><p class="text-sm text-slate-600">Potensi tinggi</p></div><span class="text-sky-700">Detail →</span></div>
              </article>
            @endif
          </div>
        </div>
      </section>

      <!-- Cara kerja -->
      <section id="cara-kerja" class="reveal mt-12 grid md:grid-cols-2 gap-8 items-start">
        <div>
          <img class="rounded-2xl w-full aspect-[4/3] object-cover shadow-xl" src="https://images.unsplash.com/photo-1509395176047-4a66953fd231?q=80&w=1600&auto=format&fit=crop" alt="Bangunan industrial" />
        </div>
        <div class="rounded-2xl bg-white p-6 shadow-soft border border-slate-200">
          <h2 class="section-title">Bagaimana Kami Bekerja</h2>
          <ul class="mt-4 grid gap-4">
            <li class="step"><span class="step-icon">💬</span><div><div class="step-title">Konsultasi & Analisis Kebutuhan</div><p class="step-desc">Memahami tujuan dan batasan Anda untuk solusi yang tepat.</p></div></li>
            <li class="step"><span class="step-icon">🔍</span><div><div class="step-title">Pencarian & Kurasi Objek</div><p class="step-desc">Mencari opsi terbaik sesuai anggaran dan lokasi.</p></div></li>
            <li class="step"><span class="step-icon">🧭</span><div><div class="step-title">Tinjauan & Penilaian</div><p class="step-desc">Kunjungan dan penilaian menyeluruh terhadap kelayakan aset.</p></div></li>
            <li class="step"><span class="step-icon">📑</span><div><div class="step-title">Pemeriksaan Dokumen</div><p class="step-desc">Pengecekan legalitas dan penyiapan dokumen transaksi.</p></div></li>
            <li class="step"><span class="step-icon">🤝</span><div><div class="step-title">Pendampingan Transaksi</div><p class="step-desc">Negosiasi hingga serah terima dilakukan dengan aman.</p></div></li>
          </ul>
        </div>
      </section>
    </div>

    <!-- Sidebar (kanan) -->
    <aside class="py-8 space-y-8">
      <section class="reveal rounded-2xl bg-white border border-slate-200 p-4 shadow-soft">
        <h3 class="font-bold text-slate-900">Properti untuk Bisnis</h3>
        <p class="text-sm text-slate-600 mt-1">Solusi properti komersial yang fleksibel dan terkurasi.</p>
        <img class="mt-3 rounded-xl w-full aspect-[4/3] object-cover" src="https://images.unsplash.com/photo-1486325212027-808078ea4261?q=80&w=1600&auto=format&fit=crop" alt="Gedung kecil" />
        <a href="#kontak" class="mt-4 btn-primary w-full text-center">Konsultasi</a>
      </section>

      <section class="reveal rounded-2xl bg-white border border-slate-200 p-6 shadow-soft">
        <h3 class="font-semibold text-slate-900">Apa kata klien</h3>
        <figure class="mt-3">
          <blockquote class="text-slate-700">“Timnya responsif, prosesnya jelas, dan hasilnya sesuai ekspektasi kami.”</blockquote>
          <figcaption class="mt-2 text-sm text-slate-500">— Pelaku Usaha</figcaption>
        </figure>
      </section>

      <section id="kontak" class="reveal rounded-2xl bg-gradient-to-b from-sky-50 to-white border border-slate-200 p-6 shadow-soft">
        <h3 class="font-semibold text-slate-900">Diskusikan kerja sama</h3>
        <form action="#" method="post" class="mt-4 grid gap-3">
          @csrf
          <input type="text" name="nama" class="field" placeholder="Nama lengkap" required>
          <input type="email" name="email" class="field" placeholder="Email" required>
          <input type="tel" name="telepon" class="field" placeholder="Nomor telepon">
          <textarea name="pesan" rows="3" class="field" placeholder="Ceritakan kebutuhan Anda"></textarea>
          <button type="submit" class="btn-primary">Kirim</button>
        </form>
      </section>
    </aside>
  </main>

  <footer class="mt-12 border-t border-slate-200">
    <div class="mx-auto max-w-7xl px-4 py-8 text-center text-sm text-slate-500">
      © {{ date('Y') }} Ekosistem Pesantren — Semua hak dilindungi.
    </div>
  </footer>

</body>
</html>