<?php

namespace App\Livewire\IzinPulangSantri;

use App\Models\IzinPulangSantri;
use App\Models\Lembaga;
use App\Models\Santri;
use Livewire\Component;
use Livewire\WithPagination;

class IzinPulangSantriDetail extends Component
{
    use WithPagination;
    
    public $role;
    public $lembaga;
    public $santri;
    public $paginate = 20;

    public function mount( Lembaga $lembaga, Santri $santri)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
      $this->santri = $santri;
    }

    public function render()
    {
        return view('livewire.izin-pulang-santri.izin-pulang-santri-detail', [
          'izins' => IzinPulangSantri::where('santri_id', $this->santri->id)->latest()->paginate($this->paginate)
        ])->title('Rekap Izin Pulang ' . $this->santri->name);
    }
}
