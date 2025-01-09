<?php

namespace App\Livewire\IzinKeluarSantri;

use App\Models\IzinKeluarSantri;
use App\Models\Lembaga;
use Livewire\Component;

class IzinKeluarSantriEdit extends Component
{
    public $role;
    public $lembaga;
    public $name;
    public $waktu_mulai;
    public $waktu_selesai;
    public $keperluan;
    public $izin;

    public function mount(Lembaga $lembaga, IzinKeluarSantri $izinKeluarSantri)
    {
      $this->role = explode('/', request()->path())[1];
      $this->lembaga = $lembaga;
      $this->izin = $izinKeluarSantri;
      $this->name = $izinKeluarSantri->santri->name;
      $this->waktu_mulai = $izinKeluarSantri->waktu_mulai;
      $this->waktu_selesai = $izinKeluarSantri->waktu_selesai;
      $this->keperluan = $izinKeluarSantri->keperluan;
    }

    public function edit()
    {
      $data = $this->validate([
        'waktu_mulai' => 'required',
        'waktu_selesai' => 'required',
        'keperluan' => 'required'
      ]);

      $this->izin->update($data);
      session()->flash('success', 'Data berhasil diubah');
      return $this->redirect('/' . $this->lembaga->id . '/' . $this->role . '/izinKeluarSantri', true);
    }

    public function render()
    {
        return view('livewire.izin-keluar-santri.izin-keluar-santri-edit');
    }
}
