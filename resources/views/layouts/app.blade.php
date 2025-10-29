<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pesantren Pusat')</title>
    <meta name="description" content="@yield('description', 'Website resmi Pesantren Pusat.')">

    {{-- Memuat Tailwind & Font --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        body { font-family: 'Manrope', sans-serif; background-color: #F9FAFB; }
        .text-primary-blue { color: #2563EB; }
        .bg-primary-blue { background-color: #2563EB; }
        .hover\:bg-primary-blue-dark:hover { background-color: #1D4ED8; }
        .active-nav-link { color: #2563EB; position: relative; }
        .active-nav-link::after { content: ''; display: block; width: 6px; height: 6px; background-color: #2563EB; border-radius: 50%; position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%); }
        .prose h1, .prose h2, .prose h3 { font-weight: 800; color: #111827; }
        .prose p { font-size: 1.125rem; line-height: 1.75; color: #374151; }
        .prose ul > li::before { background-color: #2563EB; }
        .prose a { color: #2563EB; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="text-gray-800">

    @include('layouts.header')

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')

    {{-- Ini adalah "wadah" untuk skrip kustom dari halaman lain --}}
    @stack('scripts')
</body>
</html>