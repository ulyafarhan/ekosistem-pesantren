<?php

namespace App\Livewire;

use App\Models\SejarahUnitPendidikan;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.app')]
#[Title('Jejak Sejarah Unit Pendidikan - Pesantren Pusat')]
class SejarahPendidikanPage extends Component
{
    public $sejarahSmp = null;
    public $sejarahSma = null;

    public function mount()
    {
        // Ambil SATU baris terbaru
        $sejarah = SejarahUnitPendidikan::latest()->first();

        if ($sejarah) {
            // Tetapkan properti dari baris tunggal tersebut
            $this->sejarahSmp = $sejarah->sejarah_smp;
            $this->sejarahSma = $sejarah->sejarah_sma;
        }
    }

    public function render()
    {
        // View akan secara otomatis menggunakan properti public $sejarahSmp dan $sejarahSma
        return view('livewire.sejarah-pendidikan-page');
    }
}