<?php

namespace App\Livewire\IzinPulangSantri;

use App\Models\IzinPulangSantri;
use App\Models\Lembaga;
use Livewire\Component;

class IzinPulangSantriEdit extends Component
{
    public $izin;
    public $username;
    public $waktu_mulai;
    public $waktu_selesai;
    public $keperluan;
    public $role;
    public $lembaga;

    public function mount(Lembaga $lembaga, IzinPulangSantri $izinPulangSantri)
    {
      $this->izin = $izinPulangSantri;
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];

      $this->username = $izinPulangSantri->santri->name;
      $this->waktu_mulai = $izinPulangSantri->waktu_mulai;
      $this->waktu_selesai = $izinPulangSantri->waktu_selesai;
      $this->keperluan = $izinPulangSantri->keperluan;
    }

    public function edit()
    {
      $data = $this->validate([
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'keperluan' => 'required'

        ]);

        $this->izin->update($data);

        session()->flash('success', 'Data Izin berhasil diubah');
        return $this->redirect('/' . $this->lembaga->id . '/' . $this->role . '/izinPulangSantri', true);
    }

    public function render()
    {
        return view('livewire.izin-pulang-santri.izin-pulang-santri-edit')->title('Edit Izin Pulang ' . $this->izin->santri->name);
    }
}
