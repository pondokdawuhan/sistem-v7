<?php

namespace App\Livewire\IzinSakitSantri;

use App\Models\IzinSakitSantri;
use App\Models\Lembaga;
use Livewire\Attributes\Title;
use Livewire\Component;

class IzinSakitSantriEdit extends Component
{
    public $role;
    public $lembaga;
    public $name;
    public $keluhan;
    public $izin;

    #[Title('Edit Izin Sakit Santri')]

    public function mount(Lembaga $lembaga, IzinSakitSantri $izinSakitSantri)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
      $this->name = $izinSakitSantri->santri->name;
      $this->keluhan = $izinSakitSantri->keluhan;
      $this->izin = $izinSakitSantri;
    }

    public function edit()
    {
      $data = $this->validate([
            'keluhan' => 'required'
        ]);

        $this->izin->update($data);

        session()->flash('success', 'Izin Sakit berhasil diubah');
        return $this->redirect('/' . $this->lembaga->id . '/' . $this->role . '/izinSakitSantri', true);
    }

    public function render()
    {
        return view('livewire.izin-sakit-santri.izin-sakit-santri-edit');
    }
}
