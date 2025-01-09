<?php

namespace App\Livewire\HafalanSantri;

use App\Models\Lembaga;
use Livewire\Component;
use App\Models\HafalanSantri;
use Livewire\WithPagination;

class HafalanSantriList extends Component
{
    use WithPagination;

    public $lembaga;
    public $page;
    public $paginate = 20;
    public $search;

    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
    }

    public function delete($id)
    {
      HafalanSantri::find($id)->delete();

      session()->flash('success', 'Data berhasil dihapus');

    }

    public function render()
    {
        if ($this->search) {
          $this->page = 1;
          $hafalans = HafalanSantri::with('user', 'santri')->where('lembaga_id', $this->lembaga->id)->filter($this->search)->latest()->get();
        } else {
          $hafalans = HafalanSantri::with('user', 'santri')->where('lembaga_id', $this->lembaga->id)->latest()->paginate($this->paginate);
          $this->page = $hafalans->firstItem();
        }
        return view('livewire.hafalan-santri.hafalan-santri-list', [
          'hafalans' => $hafalans
        ])->title('Hafalan Santri ' . $this->lembaga->nama);
    }
}
