<?php

namespace App\Livewire\CatatanSantri;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CatatanSantri;
use App\Models\Santri;
use Livewire\Attributes\Title;

class CatatanSantriList extends Component
{
    use WithPagination;

    #[Title('Catatan Santri')]

    public $role;
    public $page;
    public $paginate = 20;
    public $search;
    public $lembaga;

    public function mount()
    {
      $this->lembaga = explode('/', request()->path())[0];
      $this->role = explode('/', request()->path())[1];
    }

    public function delete($id)
    {
      CatatanSantri::find($id)->delete();

      session()->flash('success', 'Data berhasil dihapus');
    }

    public function render()
    {
        if ($this->role == 'pendamping' || $this->role == 'pengurus') {
          $santri = Santri::whereRelation('dataSantri', 'jenis_kelamin', auth()->user()->dataUser->jenis_kelamin)->get();
          $str = [];
          foreach ($santri as $s) {
            array_push($str, $s->id);
          }
          $catatan = CatatanSantri::with('santri', 'user', 'lembaga')->where('lembaga_id', $this->lembaga)->whereIn('santri_id', $str);
        } else {
          $catatan = CatatanSantri::with('user', 'santri', 'lembaga')->where('lembaga_id', $this->lembaga);
        }

        if ($this->search) {
          $this->page = 1;
          $catatans = $catatan->filter($this->search)->latest()->get();
        } else {
          $catatans =$catatan->latest()->paginate($this->paginate);
          $this->page = $catatans->firstItem();
        }
        return view('livewire.catatan-santri.catatan-santri-list', [
          'catatans' => $catatans
        ]);
    }
}
