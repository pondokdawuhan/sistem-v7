<?php

namespace App\Livewire\IzinAsatidz;

use App\Models\IzinAsatidz;
use App\Models\Lembaga;
use Livewire\Component;

class IzinAsatidzEdit extends Component
{
    public $lembaga;
    public $role;
    public $tanggal_mulai;
    public $keperluan;
    public $tugas;
    public $tanggal_selesai;
    public $izin;

     public function mount(Lembaga $lembaga, IzinAsatidz $izinAsatidz)
    {
      $this->lembaga = $lembaga;
      $this->role = 'guru';
      $this->izin = $izinAsatidz;
      $this->tanggal_mulai = $izinAsatidz->tanggal_mulai;
      $this->tanggal_selesai = $izinAsatidz->tanggal_selesai;
      $this->keperluan = $izinAsatidz->keperluan;
      $this->tugas = $izinAsatidz->tugas;
    }

    public function edit()
    {
      $data = $this->validate([
            'tanggal_mulai' => 'required',
            'keperluan' => 'required',
            'tugas' => 'required',
            'tanggal_selesai' => 'required'
        ]);

        $this->izin->update($data);

        session()->flash('success', 'Data berhasil diubah');

        return $this->redirect('/' . $this->lembaga->id .  '/guru/izinAsatidz', true);

        
    }
    public function render()
    {
        return view('livewire.izin-asatidz.izin-asatidz-edit');
    }
}
