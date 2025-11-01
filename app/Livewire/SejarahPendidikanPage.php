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
        $sejarah = SejarahUnitPendidikan::latest()->first();

        if ($sejarah) {
            $this->sejarahSmp = $sejarah->sejarah_smp;
            $this->sejarahSma = $sejarah->sejarah_sma;
        }
    }

    public function render()
    {
        return view('livewire.sejarah-pendidikan-page');
    }
}