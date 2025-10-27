<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-8">Berita Terbaru</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($semuaBerita as $berita)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <a href="{{ route('berita.show', $berita) }}">
                        <img src="{{ asset('storage/' . $berita->thumbnail) }}" alt="{{ $berita->judul }}" class="w-full h-48 object-cover">
                    </a>
                    <div class="p-6">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-2">{{ $berita->judul }}</h2>
                        <p class="text-gray-600 mb-4">
                            Diterbitkan pada {{ $berita->created_at->format('d F Y') }}
                        </p>
                        <a href="{{ route('berita.show', $berita) }}" class="text-blue-500 hover:text-blue-700 font-medium">
                            Baca Selengkapnya &rarr;
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $semuaBerita->links() }}
        </div>
    </div>
</body>
</html>