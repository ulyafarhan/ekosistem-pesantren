<div class="p-4">
    <h2 class="text-lg font-bold mb-4">{{ $record->judul }}</h2>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @php
            $mediaItems = is_array($record->file_media) ? $record->file_media : json_decode($record->file_media, true);
        @endphp
        @if (is_array($mediaItems))
            @foreach ($mediaItems as $media)
                <a href="{{ Storage::url($media) }}" target="_blank" class="block group">
                    <img src="{{ Storage::url($media) }}" alt="Media item"
                         class="object-cover w-full h-40 rounded-lg shadow-md group-hover:opacity-75 transition-opacity">
                </a>
            @endforeach
        @endif
    </div>

    @if (empty($record->file_media))
        <p class="text-gray-500">Tidak ada media yang ditemukan untuk galeri ini.</p>
    @endif
</div>