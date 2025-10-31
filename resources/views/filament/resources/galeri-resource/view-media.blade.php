<div x-data="{
    showModal: false,
    modalImage: '',
    modalTitle: '{{ addslashes($record->judul) }}',
    openModal(image) {
        this.modalImage = image;
        this.showModal = true;
        document.body.style.overflow = 'hidden';
    },
    closeModal() {
        this.showModal = false;
        document.body.style.overflow = 'auto';
    }
}" class="p-4">

    <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-4">{{ $record->judul }}</h2>

    @php
        $mediaItems = [];
        if (!empty($record->file_media)) {
            $mediaItems = is_array($record->file_media) ? $record->file_media : json_decode($record->file_media, true);
        }
    @endphp

    @if (!empty($mediaItems) && is_array($mediaItems))
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($mediaItems as $media)
                <div @click="openModal('{{ Storage::url($media) }}')"
                     class="group relative cursor-pointer aspect-w-1 aspect-h-1 bg-gray-100 dark:bg-gray-800 rounded-lg overflow-hidden shadow-md transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <img src="{{ Storage::url($media) }}" alt="Media item"
                         class="object-cover w-full h-full">
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="w-full text-center py-12 px-4 bg-gray-50 dark:bg-gray-800 rounded-lg border border-dashed border-gray-300 dark:border-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Tidak Ada Media</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Tidak ada file media yang ditemukan untuk galeri ini.</p>
        </div>
    @endif

    <div x-show="showModal" @keydown.escape.window="closeModal()"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm"
         x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak>
        <div @click.away="closeModal()" class="relative"
             x-show="showModal"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95">
            <img :src="modalImage" :alt="modalTitle" class="object-contain w-full h-auto max-h-[85vh] rounded-lg shadow-2xl">
            <button @click="closeModal()" class="absolute -top-2 -right-2 p-2 text-white bg-gray-800/60 rounded-full hover:bg-gray-900/80 transition focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>