<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tokoh & Sejarah Kepemimpinan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">Jejak Kepemimpinan</h1>
        <div class="space-y-12">
            @foreach ($semuaTokoh as $tokoh)
                <div class="md:flex items-center bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('storage/' . $tokoh->foto) }}" alt="Foto {{ $tokoh->nama }}" class="md:w-1/3 w-full h-64 object-cover">
                    <div class="p-8">
                        <h2 class="text-3xl font-bold text-gray-900">{{ $tokoh->nama }}</h2>
                        <p class="text-lg text-gray-600 mb-4 font-semibold">{{ $tokoh->periode_jabatan }}</p>
                        <div class="prose max-w-none text-gray-700">
                            {!! $tokoh->kisah !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>