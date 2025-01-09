<?php

namespace App\Livewire\IzinSakitSantri;

use App\Models\IzinSakitSantri;
use App\Models\Lembaga;
use App\Models\Santri;
use Livewire\Component;
use Livewire\WithPagination;

class IzinSakitSantriDetail extends Component
{
    use WithPagination;
    
    public $role;
    public $lembaga;
    public $santri;
    public $paginate;

    public function mount(Lembaga $lembaga, Santri $santri)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
      $this->santri = $santri;
    }

    public function render()
    {   
        return view('livewire.izin-sakit-santri.izin-sakit-santri-detail', [
          'izins' => IzinSakitSantri::where('santri_id', $this->santri->id)->latest()->paginate($this->paginate)
        ])->title('Rekap Izin Sakit ' . $this->santri->name);
    }
}
