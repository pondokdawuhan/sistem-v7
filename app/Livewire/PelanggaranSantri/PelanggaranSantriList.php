<?php

namespace App\Livewire\PelanggaranSantri;

use Livewire\Component;
use App\Models\PoinSantri;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\PelanggaranSantri;

class PelanggaranSantriList extends Component
{
  use WithPagination;
    #[Title('Daftar Pelanggaran Santri')]

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
      $pelanggaran = PelanggaranSantri::find($id);
      $queryPoin = PoinSantri::where('santri_id', $pelanggaran->santri_id)->first();

      if ($queryPoin) {
        $queryPoin->update(['poin_pelanggaran' => $queryPoin->poin_pelanggaran - $pelanggaran->poin]);
      }

      $pelanggaran->delete();

      session()->flash('success', 'Data berhasil dihapus');
    }

    public function render()
    {
        if ($this->search) {
          $this->page = 1;
          $pelanggarans = PelanggaranSantri::with('santri', 'user', 'referensiPoin', 'lembaga')->where('lembaga_id', $this->lembaga)->filter($this->search)->latest()->get();
        } else {
          $pelanggarans = PelanggaranSantri::with('santri', 'user', 'referensiPoin', 'lembaga')->where('lembaga_id', $this->lembaga)->latest()->paginate($this->paginate);
          $this->page = $pelanggarans->firstItem();
        }
        return view('livewire.pelanggaran-santri.pelanggaran-santri-list', [
          'pelanggarans' => $pelanggarans
        ]);
    }
}
