<?php

namespace App\Livewire\IzinPulangPendamping;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\IzinPulangSantri;
use App\Models\IzinPulangPendamping;
use Livewire\WithPagination;

class IzinPulangPendampingList extends Component
{
  use WithPagination;
    #[Title('Daftar Izin Pulang Pendamping')]

    public $search;
    public $role;
    public $setujui;
    public $titleModal;
    public $izinModal;
    public $waktu_kembali;
    public $page;
    public $paginate = 20;

    public function mount()
    {
      $this->role = explode('/', request()->path())[0];
    }

    public function cek($id)
    {
      IzinPulangPendamping::find($id)->update(['cek_satpam' => true]);

      session()->flash('success', 'Cek Satpam berhasil');
    }

    public function persetujuanPengasuh( IzinPulangPendamping $izinPulangPendamping, $persetujuan)
    {
        
        $izinPulangPendamping->update(['persetujuan_pengasuh' => $persetujuan]);
        session()->flash('success', 'Cek Pengasuh Berhasil');
    }

    public function kembali($id)
    {
      $izin = IzinPulangPendamping::find($id);
      $this->titleModal = 'Input Waktu Izin Keluar ' .  $izin->user->name;
      $this->izinModal = $izin;
    }

    public function editKembali($id)
    {
     IzinPulangPendamping::find($id)->update(['waktu_kembali' => $this->waktu_kembali]);
     session()->flash('success', 'Waktu kembali berhasil diubah');
    }

    public function delete($id)
    {
      IzinPulangPendamping::find($id)->delete();
      session()->flash('success', 'Data berhasil dihapus');
    }

    public function render()
    {
      if(request()->is('keamanan/izinPulangPendamping') || request()->is('pengasuh/izinPulangPendamping')) {
        $izins = IzinPulangPendamping::with('user');
      } else {
        $izins = IzinPulangPendamping::where('user_id', auth()->user()->id);
      }

      if ($this->search) {
        $this->page = 1;
        $izinss = $izins->filter($this->search)->latest()->get();
      } else {
        $izinss = $izins->latest()->paginate($this->paginate);
        $this->page = $izinss->firstItem();
      }

        return view('livewire.izin-pulang-pendamping.izin-pulang-pendamping-list', [
          'izins' => $izinss
        ]);
    }
}
