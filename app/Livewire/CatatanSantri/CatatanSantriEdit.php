<?php

namespace App\Livewire\CatatanSantri;

use App\Models\CatatanSantri;
use Livewire\Attributes\Title;
use Livewire\Component;

class CatatanSantriEdit extends Component
{
    #[Title('Edit Catatan Santri')]
    public $role;
    public $lembaga;
    public $santri_name;
    public $tanggal;
    public $catatan;
    public $kategori;
    public $masuk_rekomendasi;
    public $catatanSantri;

    public function mount(CatatanSantri $catatanSantri)
    {
      $this->role = explode('/', request()->path())[1];
      $this->lembaga = explode('/', request()->path())[0];
      $this->catatanSantri = $catatanSantri;
      $this->santri_name = $catatanSantri->santri->name;
      $this->tanggal = $catatanSantri->tanggal;
      $this->catatan = $catatanSantri->catatan;
      $this->kategori = $catatanSantri->kategori;
      $this->masuk_rekomendasi = $catatanSantri->masuk_rekomendasi;
    }

    public function edit()
    {
      $data = $this->validate([
          'tanggal' => 'required',
          'catatan' => 'required',
          'kategori' => 'required',
          'masuk_rekomendasi' => 'required'
        ]);

        $this->catatanSantri->update($data);

        session()->flash('success', 'Data berhasil diubah');
        return $this->redirect('/'. $this->lembaga . '/' . $this->role .'/catatanSantri', true);
    }
    public function render()
    {
        return view('livewire.catatan-santri.catatan-santri-edit');
    }
}
