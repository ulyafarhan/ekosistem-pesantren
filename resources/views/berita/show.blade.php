<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->judul }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-8">
        <article class="bg-white rounded-lg shadow-md p-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $berita->judul }}</h1>
            <p class="text-gray-500 mb-6">
                Diterbitkan oleh {{ $berita->user->name }} pada {{ $berita->created_at->format('d F Y') }}
            </p>
            <img src="{{ asset('storage/' . $berita->thumbnail) }}" alt="{{ $berita->judul }}" class="w-full rounded-lg mb-8">
            
            <div class="prose max-w-none">
                {!! $berita->konten !!}
            </div>

            <a href="{{ route('berita.index') }}" class="text-blue-500 hover:text-blue-700 font-medium mt-8 inline-block">
                &larr; Kembali ke semua berita
            </a>
        </article>
    </div>
</body>
</html>