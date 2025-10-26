<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class StorageClearUploads extends Command
{
    protected $signature = 'storage:clear-uploads';
    protected $description = 'Menghapus semua direktori upload dari storage public';

    public function handle()
    {
        $directories = ['berita', 'galeri', 'pengurus', 'tokoh-sejarah'];

        foreach ($directories as $directory) {
            Storage::disk('public')->deleteDirectory($directory);
            $this->info("Directory '{$directory}' telah dibersihkan.");
        }

        $this->info('Semua direktori upload telah dibersihkan.');
        return 0;
    }
}