<?php

namespace App\Livewire\IzinPulangSantri;

use App\Models\Santri;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\IzinPulangSantri;
use App\Models\Lembaga;
use Livewire\WithPagination;

class IzinPulangSantriList extends Component
{
    use WithPagination;

    #[Title('Daftar Izin Pulang Santri')]
    public $role;
    public $lembaga;
    public $search;
    public $setujui;
    public $titleModal;
    public $izinModal;
    public $waktu_kembali;
    public $page;
    public $paginate = 20;
    
    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga ?? 0;
      $this->role = explode('/', request()->path())[1];
    
    }

    public function delete($id)
    {
      IzinPulangSantri::find($id)->delete();

      session()->flash('success', 'Data izin berhasil dihapus');
    }

    public function cekSatpam($id) {
      IzinPulangSantri::find($id)->update(['cek_satpam' => true]);
      session()->flash('success', 'Cek Satpam berhasil');
    }

    public function persetujuanPengasuh( IzinPulangSantri $izinPulangSantri, $persetujuan)
    {
        
        $izinPulangSantri->update(['persetujuan_pengasuh' => $persetujuan]);
        session()->flash('success', 'Cek Pengasuh Berhasil');
    }

    public function kembali($id)
    {
      $izin = IzinPulangSantri::find($id);
      $this->titleModal = 'Input Waktu Izin Keluar ' .  $izin->santri->name;
      $this->izinModal = $izin;
    }

    public function editKembali($id)
    {
     IzinPulangSantri::find($id)->update(['waktu_kembali' => $this->waktu_kembali]);
     session()->flash('success', 'Waktu kembali berhasil diubah');
    }

    public function render()
    {
      if ($this->role == 'keamanan' || $this->role == 'pengasuh') {
        $izins = IzinPulangSantri::with('santri');
      } else {
        $izins = IzinPulangSantri::with('santri')->where('lembaga_id', $this->lembaga->id);
      }

      if ($this->search) {
        $izinss = $izins->filter($this->search)->latest()->get();
        $this->page = 1;
      } else {
        $izinss = $izins->latest()->paginate($this->paginate);
        $this->page = $izinss->firstItem();
      }

        return view('livewire.izin-pulang-santri.izin-pulang-santri-list', [
          'izins' => $izinss
        ]);
    }
}
