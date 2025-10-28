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
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <nav x-data="{ open: false }" class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <a href="{{ route('homepage') }}" class="text-2xl font-bold text-gray-800">Pesantren Pusat</a>
                <div class="hidden md:flex items-center space-x-8 text-gray-600 font-medium">
                    <a href="{{ route('homepage') }}" class="hover:text-blue-600">Home</a>
                    <a href="{{ route('program.index') }}" class="hover:text-blue-600">Program</a>
                    <a href="{{ route('berita.index') }}" class="hover:text-blue-600">Berita</a>
                    <a href="{{ route('galeri.index') }}" class="hover:text-blue-600">Galeri</a>
                    <a href="{{ route('pengurus.index') }}" class="hover:text-blue-600">Struktur</a>
                    <a href="{{ route('tokoh.sejarah.index') }}" class="hover:text-blue-600">Sejarah</a>
                    <a href="#kontak" class="bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300">Hubungi Kami</a>
                </div>
                <div class="md:hidden">
                    <button @click="open = !open" class="text-gray-800 hover:text-blue-600 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div :class="{'block': open, 'hidden': !open}" class="md:hidden">
            <a href="{{ route('homepage') }}" class="block py-2 px-4 text-sm hover:bg-gray-100">Home</a>
            <a href="{{ route('program.index') }}" class="block py-2 px-4 text-sm hover:bg-gray-100">Program</a>
            <a href="{{ route('berita.index') }}" class="block py-2 px-4 text-sm hover:bg-gray-100">Berita</a>
            <a href="{{ route('galeri.index') }}" class="block py-2 px-4 text-sm hover:bg-gray-100">Galeri</a>
            <a href="{{ route('pengurus.index') }}" class="block py-2 px-4 text-sm hover:bg-gray-100">Struktur</a>
            <a href="{{ route('tokoh.sejarah.index') }}" class="block py-2 px-4 text-sm hover:bg-gray-100">Sejarah</a>
            <a href="#kontak" class="block py-2 px-4 text-sm hover:bg-gray-100">Hubungi Kami</a>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer id="kontak" class="bg-gray-900 text-white py-16">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Pesantren Pusat</h3>
                    <p class="text-gray-400">Membentuk generasi Rabbani yang cerdas, mandiri, dan berakhlakul karimah.</p>
                </div>
                <div>
                    <h3 class="font-semibold mb-4 text-gray-200">Navigasi Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('berita.index') }}" class="text-gray-400 hover:text-white">Berita</a></li>
                        <li><a href="{{ route('galeri.index') }}" class="text-gray-400 hover:text-white">Galeri</a></li>
                        <li><a href="{{ route('pengurus.index') }}" class="text-gray-400 hover:text-white">Struktur Pengurus</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-4 text-gray-200">Tentang Kami</h3>
                    <ul class="space-y-2">
                         <li><a href="{{ route('tokoh.sejarah.index') }}" class="text-gray-400 hover:text-white">Sejarah</a></li>
                         <li><a href="{{ route('program.index') }}" class="text-gray-400 hover:text-white">Program & Fasilitas</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-4 text-gray-200">Hubungi Kami</h3>
                    <p class="text-gray-400">Jl. Pendidikan No. 1, Kota Santri</p>
                    <p class="text-gray-400">Email: info@pesantrenpusat.id</p>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-700 pt-6 text-center text-gray-500">
                <p>&copy; {{ date('Y') }} Pesantren Pusat. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

</body>
</html>