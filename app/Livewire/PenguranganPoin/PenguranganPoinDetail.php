<?php

namespace App\Livewire\PenguranganPoin;

use App\Models\Santri;
use Livewire\Component;
use App\Models\PenguranganPoin;
use Livewire\WithPagination;

class PenguranganPoinDetail extends Component
{
    use WithPagination;
    public $santri;
    public $paginate = 20;
    public $role;
    public $lembaga;

    public function mount(Santri $santri)
    {
      $this->santri = $santri;
      $this->role = explode('/', request()->path())[1];
      $this->lembaga = explode('/', request()->path())[0];
    }

    public function render()
    {
        return view('livewire.pengurangan-poin.pengurangan-poin-detail', [
          'pengurangans' => PenguranganPoin::where('santri_id', $this->santri->id)->latest()->paginate($this->paginate)
        ])->title('Rekap Pengurangan Poin ' . $this->santri->name);
    }
}
