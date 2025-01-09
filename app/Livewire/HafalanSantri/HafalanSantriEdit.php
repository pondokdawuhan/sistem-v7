<?php

namespace App\Livewire\HafalanSantri;

use App\Models\HafalanSantri;
use App\Models\Lembaga;
use Livewire\Component;

class HafalanSantriEdit extends Component
{
    public $lembaga;
    public $hafalanSantri;
    public $santri_name;
    public $tanggal;
    public $keterangan;

    public function mount(Lembaga $lembaga, HafalanSantri $hafalanSantri)
    {
      $this->lembaga = $lembaga;
      $this->hafalanSantri = $hafalanSantri;

      $this->santri_name = $hafalanSantri->santri->name;
      $this->tanggal = $hafalanSantri->tanggal;
      $this->keterangan = $hafalanSantri->keterangan;
    }

    public function edit()
    {
      $data = $this->validate([
          'tanggal' => 'required',
          'keterangan' => 'required',
        ]);

        $this->hafalanSantri->update($data);

        session()->flash('success', 'Data berhasil diubah');
        return $this->redirect('/' . $this->lembaga->id . '/hafalanSantri', true);
    }


    public function render()
    {
        return view('livewire.hafalan-santri.hafalan-santri-edit')->title('Edit Hafalan Santri ' . $this->lembaga->nama);
    }
}
