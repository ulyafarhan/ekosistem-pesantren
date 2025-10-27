<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Kegiatan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-8">Galeri Kegiatan</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            @foreach ($semuaGaleri as $item)
                <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                    <div class="relative">
                        {{-- Logika untuk menampilkan Gambar atau Video --}}
                        @if ($item->tipe === 'foto')
                            <img src="{{ asset('storage/' . $item->media) }}" alt="{{ $item->judul }}" class="w-full h-56 object-cover">
                        @elseif ($item->tipe === 'video')
                            {{-- Ekstrak ID video YouTube dari URL --}}
                            @php
                                parse_str(parse_url($item->media, PHP_URL_QUERY), $vars);
                                $youtubeId = $vars['v'] ?? null;
                            @endphp
                            @if ($youtubeId)
                                <iframe class="w-full h-56" src="https://www.youtube.com/embed/{{ $youtubeId }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @endif
                        @endif
                         <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <p class="text-white text-lg font-semibold text-center p-4">{{ $item->judul }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="mt-8">
            {{ $semuaGaleri->links() }}
        </div>
    </div>
</body>
</html>