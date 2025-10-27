<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Kepengurusan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">Struktur Kepengurusan</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($semuaPengurus as $pengurus)
                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <img src="{{ asset('storage/' . $pengurus->foto) }}" alt="Foto {{ $pengurus->nama }}" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-4 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">{{ $pengurus->nama }}</h3>
                    <p class="text-gray-500">{{ $pengurus->jabatan }}</p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>