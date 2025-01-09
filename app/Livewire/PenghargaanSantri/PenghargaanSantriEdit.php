<?php

namespace App\Livewire\PenghargaanSantri;

use App\Models\PenghargaanSantri;
use Livewire\Component;

class PenghargaanSantriEdit extends Component
{
    public $penghargaanSantri;
    public $santri_name;
    public $tanggal;
    public $prestasi;
    public $penghargaan;
    public $role;
    public $lembaga;

    public function mount(PenghargaanSantri $penghargaanSantri)
    {
      $this->role = explode('/', request()->path())[1];
      $this->lembaga = explode('/', request()->path())[0];
      $this->penghargaanSantri = $penghargaanSantri;
      $this->tanggal = $penghargaanSantri->tanggal;
      $this->prestasi = $penghargaanSantri->prestasi;
      $this->penghargaan = $penghargaanSantri->penghargaan;
      $this->santri_name = $penghargaanSantri->santri->name;
    }

    public function edit()
    {
      $data = $this->validate([
          'tanggal' => 'required',
          'prestasi' => 'required',
          'penghargaan' => 'required',

        ]);

        $this->penghargaanSantri->update($data);

        session()->flash('success', 'Data penghargaan berhasil ditambah');

        return $this->redirect('/' . $this->lembaga . '/'. $this->role .'/penghargaanSantri', true);
    }

    public function render()
    {
        return view('livewire.penghargaan-santri.penghargaan-santri-edit');
    }
}
