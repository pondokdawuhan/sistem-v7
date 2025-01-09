<?php

namespace App\Livewire\PelanggaranSantri;

use App\Models\PelanggaranSantri;
use App\Models\Santri;
use Livewire\Component;
use Livewire\WithPagination;

class PelanggaranSantriDetail extends Component
{
  use WithPagination;
    public $santri;
    public $page;
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
        return view('livewire.pelanggaran-santri.pelanggaran-santri-detail', [
          'pelanggarans' => PelanggaranSantri::where('santri_id', $this->santri->id)->latest()->paginate($this->paginate)
        ])->title('Detail pelanggaran santri ' . $this->santri->name);
    }
}
