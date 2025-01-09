<?php

namespace App\Livewire\IzinKeluarSantri;

use App\Models\IzinKeluarSantri;
use App\Models\Lembaga;
use App\Models\Santri;
use Livewire\Component;
use Livewire\WithPagination;

class IzinKeluarSantriDetail extends Component
{
    use WithPagination;

    public $role;
    public $lembaga;
    public $santri;
    public $page;
    public $paginate;

    public function mount(Lembaga $lembaga, Santri $santri)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
      $this->santri = $santri;
    }

    public function render()
    {
        return view('livewire.izin-keluar-santri.izin-keluar-santri-detail', [
          'izins' => IzinKeluarSantri::where('santri_id', $this->santri->id)->latest()->paginate($this->paginate)
        ])->title('Rekap Izin Keluar ' . $this->santri->name);
    }
}
