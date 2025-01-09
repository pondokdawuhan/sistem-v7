<?php

namespace App\Livewire\PresensiSholatPendamping;

use Livewire\Component;
use App\Models\PresensiSholatPendamping;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

class PresensiSholatPendampingList extends Component
{
    use WithPagination;
    
    public $page;
    public $paginate = 20;
    public $search;

    #[Title('Presensi Sholat Pendamping')]

    public function render()
    {
        if ($this->search) {
          $presensis = PresensiSholatPendamping::with('user')->filter($this->search)->latest()->get();
        } else {
          $presensis = PresensiSholatPendamping::with('user')->latest()->paginate($this->paginate);
        }
        return view('livewire.presensi-sholat-pendamping.presensi-sholat-pendamping-list', [
          'presensis' => $presensis
        ]);
    }
}
