<?php

namespace App\Livewire\PenghargaanSantri;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\PenghargaanSantri;
use Livewire\WithPagination;

class PenghargaanSantriList extends Component
{
    use WithPagination;
    #[Title('Daftar Penghargaan Santri')]

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
      PenghargaanSantri::find($id)->delete();
      session()->flash('success', 'Data berhasil dihapus');
    }

    public function render()
    {
        if ($this->search) {
          $this->page = 1;
          $penghargaans = PenghargaanSantri::with('user', 'santri', 'lembaga')->where('lembaga_id', $this->lembaga)->filter($this->search)->latest()->get();
        } else {
          $penghargaans = PenghargaanSantri::with('user', 'santri', 'lembaga')->where('lembaga_id', $this->lembaga)->latest()->paginate($this->paginate);
          $this->page = $penghargaans->firstItem();
        }
        return view('livewire.penghargaan-santri.penghargaan-santri-list', [
          'penghargaans' => $penghargaans
        ]);
    }
}
