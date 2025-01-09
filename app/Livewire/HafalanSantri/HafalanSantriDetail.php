<?php

namespace App\Livewire\HafalanSantri;

use App\Models\Santri;
use App\Models\Lembaga;
use Livewire\Component;
use App\Models\HafalanSantri;

class HafalanSantriDetail extends Component
{
    public $santri;
    public $paginate = 20;
    public $lembaga;

    public function mount(Lembaga $lembaga, Santri $santri)
    {
      $this->lembaga = $lembaga;
      $this->santri = $santri;
    }

    public function render()
    {
        return view('livewire.hafalan-santri.hafalan-santri-detail', [
          'hafalans' => HafalanSantri::with('user')->where('santri_id', $this->santri->id)->latest()->paginate($this->paginate),
        ])->title('Rekap hafalan santri ' . $this->santri->name);
    }
}
