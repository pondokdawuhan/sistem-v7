<?php

namespace App\Livewire\PenghargaanSantri;

use App\Models\PenghargaanSantri;
use App\Models\Santri;
use Livewire\Component;
use Livewire\WithPagination;

class PenghargaanSantriDetail extends Component
{
  use WithPagination;
    public $santri;
    public $paginate = 20;
    public $role;
    public $lembaga;

    public function mount(Santri $santri)
    {
      $this->lembaga = explode('/', request()->path())[0];
      $this->role = explode('/', request()->path())[1];
      $this->santri = $santri;
    }
    public function render()
    {
        return view('livewire.penghargaan-santri.penghargaan-santri-detail', [
          'penghargaans' => PenghargaanSantri::where('santri_id', $this->santri->id)->latest()->paginate($this->paginate)
        ])->title('Rekap Penghargaan ' . $this->santri->name);
    }
}
