<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Testimoni;

class TestimoniSlider extends Component
{
    public $testimonis = [];

    public function mount()
    {
        $testimonis = Testimoni::where('is_active', true)->latest()->take(3)->get();
        $this->testimonis = $testimonis;
    }

    public function render()
    {
        return view('livewire.testimoni-slider');
    }
}