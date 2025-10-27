<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pesantren Pusat')</title>   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-800">

    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="text-2xl font-bold text-gray-800">Pesantren Pusat</div>
                <div class="hidden md:flex space-x-8 text-gray-600">
                    <a href="{{ route('homepage') }}" class="hover:text-blue-500">Home</a>
                    <a href="{{ route('berita.index') }}" class="hover:text-blue-500">Berita</a>
                    <a href="{{ route('galeri.index') }}" class="hover:text-blue-500">Galeri</a>
                    <a href="{{ route('pengurus.index') }}" class="hover:text-blue-500">Struktur</a>
                    <a href="{{ route('tokoh.sejarah.index') }}" class="hover:text-blue-500">Sejarah</a>
                </div>
                <a href="#kontak" class="hidden md:block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">Kontak Kami</a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer id="kontak" class="bg-gray-800 text-white py-16">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Pesantren Pusat</h3>
                    <p class="text-gray-400">Membentuk generasi Rabbani yang cerdas, mandiri, dan berakhlakul karimah.</p>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Navigasi Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('berita.index') }}" class="text-gray-400 hover:text-white">Berita</a></li>
                        <li><a href="{{ route('galeri.index') }}" class="text-gray-400 hover:text-white">Galeri</a></li>
                        <li><a href="{{ route('pengurus.index') }}" class="text-gray-400 hover:text-white">Struktur Pengurus</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Tentang Kami</h3>
                    <ul class="space-y-2">
                         <li><a href="{{ route('tokoh.sejarah.index') }}" class="text-gray-400 hover:text-white">Sejarah</a></li>
                         <li><a href="#" class="text-gray-400 hover:text-white">Visi & Misi</a></li>
                         <li><a href="#" class="text-gray-400 hover:text-white">Program & Fasilitas</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Hubungi Kami</h3>
                    <p class="text-gray-400">Jl. Pendidikan No. 1, Kota Santri</p>
                    <p class="text-gray-400">Email: info@pesantrenpusat.id</p>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-700 pt-6 text-center text-gray-500">
                <p>&copy; {{ date('Y') }} Pesantren Pusat. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>