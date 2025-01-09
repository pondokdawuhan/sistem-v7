<?php

namespace App\Livewire\PenguranganPoin;

use App\Models\Santri;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\PenguranganPoin;

class PenguranganPoinCreate extends Component
{
    #[Title('Tambah pengurangan poin santri')]

    public $santri_id = [];
    public $tanggal;
    public $keterangan;
    public $poin_dikurangi;
    public $role;
    public $lembaga;

    public function mount()
    {
      $this->role = explode('/', request()->path())[1];
      $this->lembaga = explode('/', request()->path())[0];
    }

    public function tambah()
    {
      foreach ($this->santri_id as $santri_id) {
          PenguranganPoin::create([
            'lembaga_id' => $this->lembaga,
            'santri_id' => $santri_id,
            'user_id' => auth()->user()->id,
            'tanggal' => $this->tanggal,
            'keterangan' => $this->keterangan,
            'poin_dikurangi' => $this->poin_dikurangi
          ]);
        }

        session()->flash('success', 'Data berhasil ditambah');
        return $this->redirect('/'. $this->lembaga . '/' . $this->role .'/penguranganPoin', true);
    }

    public function render()
    {
      if ($this->role == 'kesiswaan') {
          $santris = Santri::all();
        } else {
          $santris = Santri::whereRelation('dataSantri', 'jenis_kelamin', auth()->user()->dataUser->jenis_kelamin)->get();
        }

        return view('livewire.pengurangan-poin.pengurangan-poin-create', [
          'santris' => $santris
        ]);
    }
}
