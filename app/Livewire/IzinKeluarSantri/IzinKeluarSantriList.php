<?php

namespace App\Livewire\IzinKeluarSantri;

use App\Models\Santri;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\IzinKeluarSantri;
use App\Models\Lembaga;
use Livewire\WithPagination;

class IzinKeluarSantriList extends Component
{
    use WithPagination;
    public $search;
    public $role;
    public $lembaga;

    public $titleModal;
    public $izinModal;
    public $waktu_kembali;
    public $page;
    public $paginate = 20;

    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
    }

    public function delete($id)
    {
      IzinKeluarSantri::find($id)->delete();

      session()->flash('success', 'Data berhasil dihapus');
    }

    public function cek($id)
    {
      IzinKeluarSantri::find($id)->update(['cek_satpam' => true]);

      session()->flash('success', 'cek Satpam berhasil');
    }

    public function kembali($id)
    {
      $izin = IzinKeluarSantri::find($id);
      $this->titleModal = 'Input Waktu Izin Keluar ' .  $izin->santri->name;
      $this->izinModal = $izin;
    }

    public function editKembali($id)
    {
     IzinKeluarSantri::find($id)->update(['waktu_kembali' => $this->waktu_kembali]);
     session()->flash('success', 'Waktu kembali berhasil diubah');
    }

    public function render()
    {
      
      if ($this->role == 'keamanan') {
        $izins = IzinKeluarSantri::with('santri');
      } else{
        $izins = IzinKeluarSantri::with('santri')->where('lembaga_id', $this->lembaga->id);
      } 
      

      if ($this->search) {
        $izinss = $izins->filter($this->search)->latest()->get();
        $this->page = 1;
      } else {
        $izinss = $izins->latest()->paginate($this->paginate);
        $this->page = $izinss->firstItem();
      }
        return view('livewire.izin-keluar-santri.izin-keluar-santri-list', [
          'izins' => $izinss
        ])->title('Izin Keluar Santri ' . $this->lembaga->nama);
    }
}
