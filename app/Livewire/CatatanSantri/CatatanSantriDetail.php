<?php

namespace App\Livewire\CatatanSantri;

use App\Models\CatatanSantri;
use App\Models\Santri;
use Livewire\Component;
use Livewire\WithPagination;

class CatatanSantriDetail extends Component
{
  use WithPagination;
    public $role;
    public $lembaga;
    public $paginate = 20;
    public $santri;

     public function mount(Santri $santri)
    {
      $this->role = explode('/', request()->path())[1];
      $this->lembaga = explode('/', request()->path())[0];
      $this->santri = $santri;
    }

    public function render()
    {
        return view('livewire.catatan-santri.catatan-santri-detail', [
          'catatans' => CatatanSantri::with('user')->where('santri_id', $this->santri->id)->latest()->paginate($this->paginate)
        ])->title('Rekap catatan santri ' .$this->santri->name);
    }
}
