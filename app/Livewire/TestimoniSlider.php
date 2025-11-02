<?php

namespace App\Livewire;

use App\Models\Testimoni;
use Livewire\Component;

class TestimoniSlider extends Component
{
    /**
     * Hapus public $testimonis dan method mount()
     * * Ambil data testimoni langsung di dalam method render()
     * agar tidak tersimpan di public property dan membebani request.
     */

    public function render()
    {
        // Ambil data testimoni di sini
        $testimonis = Testimoni::latest()->take(5)->get(); // Ambil semua (atau batasi dengan ->take(10)->get())

        // Kirim data ke view
        return view('livewire.testimoni-slider', [
            'testimonis' => $testimonis
        ]);
    }
}