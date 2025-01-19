<?php

namespace App\Livewire\PelanggaranSantri;

use App\Models\Santri;
use Livewire\Component;
use App\Models\PoinSantri;
use App\Models\ReferensiPoin;
use App\Models\PelanggaranSantri;

class PelanggaranSantriCreate extends Component
{
    public $santri_id = [];
    public $referensi_poin_id;
    public $tanggal;
    public $keterangan;
    public $poin;

    public $role;
    public $lembaga;

    public function mount()
    {
      $this->lembaga = explode('/', request()->path())[0];
      $this->role = explode('/', request()->path())[1];
    }

    public function tambah()
    {
      
      foreach ($this->santri_id as $santri_id) {
          PelanggaranSantri::create([
            'lembaga_id' => $this->lembaga,
            'santri_id' => $santri_id,
            'user_id' => auth()->user()->id,
            'referensi_poin_id' => $this->referensi_poin_id,
            'tanggal' => $this->tanggal,
            'keterangan' => $this->keterangan,
            'poin' => $this->poin
          ]);

          $poin = PoinSantri::where('santri_id', $santri_id)->first();

          if ($poin) {
            $poin->update([
              'poin_pelanggaran' => $poin->poin_pelanggaran + $this->poin
            ]);
          } else {
            PoinSantri::create([
              'santri_id' => $santri_id,
              'poin_pelanggaran' => $this->poin
            ]);
          }
        }

        session()->flash('success', 'Data Pelanggaran berhasil ditambah');
        return $this->redirect('/' . $this->lembaga . '/' . $this->role .'/pelanggaranSantri', true);
    }

    public function render()
    {
        if ($this->role == 'kesiswaan') {
          $santris = Santri::with('dataSantri')->get();
        } else {
          $santris = Santri::with('dataSantri')->whereRelation('dataSantri', 'jenis_kelamin', auth()->user()->dataUser->jenis_kelamin)->get();
        }

        return view('livewire.pelanggaran-santri.pelanggaran-santri-create', [
          'santris' => $santris,
          'referensiPoins' => ReferensiPoin::all() 
        ]);
    }
}
