<?php

namespace App\Livewire\PelanggaranSantri;

use App\Models\Santri;
use Livewire\Component;
use App\Models\PoinSantri;
use App\Models\ReferensiPoin;
use App\Models\PelanggaranSantri;

class PelanggaranSantriEdit extends Component
{
    public $referensi_poin_id;
    public $tanggal;
    public $keterangan;
    public $poin;
    public $santri_id;
    public $santri_name;
    public $pelanggaranSantri;

    public $role;
    public $lembaga;


    public function mount(PelanggaranSantri $pelanggaranSantri)
    {
      $this->role = explode('/', request()->path())[1];
      $this->lembaga = explode('/', request()->path())[0];
      $this->pelanggaranSantri = $pelanggaranSantri;
      $this->santri_id = $pelanggaranSantri->santri_id;
      $this->santri_name = $pelanggaranSantri->santri->name;
      $this->tanggal = $pelanggaranSantri->tanggal;
      $this->keterangan = $pelanggaranSantri->keterangan;
      $this->poin = $pelanggaranSantri->poin;
      $this->referensi_poin_id = $pelanggaranSantri->referensi_poin_id;
    }


    public function edit()
    {
      $data = $this->validate([
            'referensi_poin_id' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'poin' => 'required'
          ]);

          $poin = PoinSantri::where('santri_id', $this->pelanggaranSantri->santri_id)->first();

          if ($poin) {
            $poin->update([
              'poin_pelanggaran' => $poin->poin_pelanggaran - $this->pelanggaranSantri->poin + $this->poin
            ]);
          } else {
            PoinSantri::create([
              'santri_id' => $this->pelanggaranSantri->santri_id,
              'poin_pelanggaran' => $this->poin
            ]);
          }

          $this->pelanggaranSantri->update($data);

          session()->flash('success', 'Data berhasil diubah');
          return $this->redirect('/'. $this->lembaga . '/' . $this->role .'/pelanggaranSantri', true);
    }

    public function render()
    {
        return view('livewire.pelanggaran-santri.pelanggaran-santri-edit', [
          'santris' => Santri::whereRelation('dataSantri', 'jenis_kelamin', auth()->user()->dataUser->jenis_kelamin)->get(),
          'referensiPoins' => ReferensiPoin::all() 
        ])->title('Edit Pelanggaran Santri ' . $this->santri_name);
    }
}
