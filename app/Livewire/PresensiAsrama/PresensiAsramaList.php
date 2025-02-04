<?php

namespace App\Livewire\PresensiAsrama;

use App\Models\Lembaga;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PresensiAsrama;
use Livewire\Attributes\Title;

class PresensiAsramaList extends Component
{
  use WithPagination;

  public $role;
  public $lembaga;
  public $page;
  public $paginate = 20;
  public $search;

  public function mount(Lembaga $lembaga)
  {
    $this->lembaga = $lembaga;
    $this->role = explode('/', request()->path())[1];
  }

  public function render()
  {
    if ($this->search) {
      $presensis = PresensiAsrama::with('user', 'santri')->where('lembaga_id', $this->lembaga->id)->filter($this->search)->latest()->get();
    } else {
      $presensis = PresensiAsrama::with('user', 'santri')->where('lembaga_id', $this->lembaga->id)->latest()->paginate($this->paginate);
    }
    return view('livewire.presensi-asrama.presensi-asrama-list', [
      'presensis' => $presensis
    ])->title('Presensi Asrama ' . $this->lembaga->nama);
  }
}
