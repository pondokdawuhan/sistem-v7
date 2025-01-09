<?php

namespace App\Livewire\IzinAsatidz;

use App\Models\IzinAsatidz;
use App\Models\Lembaga;
use Livewire\Component;
use Livewire\WithPagination;

class IzinAsatidzList extends Component
{
    use WithPagination;

    public $role;
    public $lembaga;
    public $search;
    public $page;
    public $paginate = 20;

    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
    }

    public function delete($id)
    {
      IzinAsatidz::find($id)->delete();

      session()->flash('success', 'Data berhasil dihapus');

      
    }

    public function cek($id)
    {
      IzinAsatidz::find($id)->update(['cek_kepala' => true]);
      session()->flash('success', 'Cek Izin berhasil');
    }

    public function render()
    {
        if ($this->role == 'guru') {
          $izins = IzinAsatidz::with('user')->where('lembaga_id', $this->lembaga->id)->where('user_id', auth()->user()->id)->filter($this->search)->latest();
        } else {
          $izins = IzinAsatidz::with('user')->where('lembaga_id', $this->lembaga->id)->filter($this->search)->latest();
        }
        
        if ($this->search) {
            $this->page = 1;
            $izinss = $izins->get();
        } else {
          $izinss = $izins->paginate($this->paginate);
          $this->page = $izinss->firstItem();
        }

        return view('livewire.izin-asatidz.izin-asatidz-list', [
          'izinAsatidz' => $izinss
        ])->title('Daftar Izin Asatidz ' . $this->lembaga->nama);
    }
}
