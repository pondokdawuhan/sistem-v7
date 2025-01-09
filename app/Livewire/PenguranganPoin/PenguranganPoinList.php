<?php

namespace App\Livewire\PenguranganPoin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\PenguranganPoin;

class PenguranganPoinList extends Component
{
  use WithPagination;
    #[Title('Daftar Pengurangan Poin Santri')]

    public $page;
    public $paginate = 20;
    public $search;
    public $role;
    public $lembaga;

    public function mount()
    {
      $this->lembaga = explode('/', request()->path())[0];
      $this->role = explode('/', request()->path())[1];
    }

    public function delete($id)
    {
      PenguranganPoin::find($id)->delete();
      session()->flash('success', 'Data berhasil dihapus');
    }
    
    public function render()
    {
        if ($this->search) {
          $this->page = 1;
          $pengurangans = PenguranganPoin::with('santri', 'user', 'lembaga')->where('lembaga_id', $this->lembaga)->filter($this->search)->latest()->get();
        } else {
          $pengurangans = PenguranganPoin::with('santri', 'user', 'lembaga')->where('lembaga_id', $this->lembaga)->latest()->paginate($this->paginate);
          $this-> page = $pengurangans->firstItem();
        }

        return view('livewire.pengurangan-poin.pengurangan-poin-list', [
          'pengurangans' => $pengurangans
        ]);
    }
}
