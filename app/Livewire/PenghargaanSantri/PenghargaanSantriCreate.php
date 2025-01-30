<?php

namespace App\Livewire\PenghargaanSantri;

use App\Models\Santri;
use Livewire\Component;
use App\Models\PenghargaanSantri;
use Livewire\Attributes\Title;

class PenghargaanSantriCreate extends Component
{
  #[Title('Tambah Penghargaan Santri')]
  
    public $santri_id = [];
    public $tanggal;
    public $prestasi;
    public $penghargaan;
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
          PenghargaanSantri::create([
            'lembaga_id' => $this->lembaga,
            'santri_id' => $santri_id,
            'user_id' => auth()->user()->id,
            'tanggal' => $this->tanggal,
            'prestasi' => $this->prestasi,
            'penghargaan' => $this->penghargaan
          ]);
        }

        session()->flash('success', 'Data penghargaan berhasil ditambah');

        return $this->redirect('/'. $this->lembaga . '/' .  $this->role .'/penghargaanSantri', true);
    }

    public function render()
    {
        if ($this->role == 'kesiswaan') {
          $santris = Santri::with('dataSantri')->get();
        } else {
          $santris = Santri::with('dataSantri')->whereRelation('dataSantri', 'jenis_kelamin', auth()->user()->dataUser->jenis_kelamin)->get();
        }

        return view('livewire.penghargaan-santri.penghargaan-santri-create', [
          'santris' => $santris
        ]);
    }
}
