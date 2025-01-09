<?php

namespace App\Livewire\IzinKeluarPendamping;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\IzinKeluarPendamping;
use Livewire\WithPagination;

class IzinKeluarPendampingList extends Component
{
    use WithPagination;
    #[Title('Daftar Izin Keluar Pendamping')]

    public $role;
    public $search;
    public $page;
    public $paginate = 20;

    
    public $titleModal;
    public $izinModal;
    public $waktu_kembali;

    public function mount()
    {
      $this->role = explode('/', request()->path())[0];
    }

    public function delete($id)
    {
      IzinKeluarPendamping::find($id)->delete();

      session()->flash('success', 'Data berhasil dihapus');
    }

    public function cek($id)
    {
      IzinKeluarPendamping::find($id)->update(['cek_satpam' => true]);

      session()->flash('success', 'cek izin berhasil');
    }

    
    public function kembali($id)
    {
      $izin = IzinKeluarPendamping::find($id);
      $this->titleModal = 'Input Waktu Izin Keluar ' .  $izin->user->name;
      $this->izinModal = $izin;
    }

    public function editKembali($id)
    {
     IzinKeluarPendamping::find($id)->update(['waktu_kembali' => $this->waktu_kembali]);
     session()->flash('success', 'Waktu kembali berhasil diubah');
    }

    public function render()
    {

      if ($this->role == 'keamanan') {
        $izins = IzinKeluarPendamping::with('user');
      } else {
        $izins = IzinKeluarPendamping::where('user_id', auth()->user()->id);
      }

      if ($this->search) {
        $this->page = 1;
        $izinss = $izins->filter($this->search)->latest()->get();
      } else {
        $izinss = $izins->filter($this->search)->latest()->paginate($this->paginate);
        $this->page = $izinss->firstItem();
      }
      
        return view('livewire.izin-keluar-pendamping.izin-keluar-pendamping-list', [
          'izins' => $izinss
        ]);
    }
}
