<?php

namespace App\Livewire\BatasPoin;

use App\Models\BatasPoin;
use Livewire\Attributes\Title;
use Livewire\Component;

class BatasPoinCreate extends Component
{

    public $jenis_poin;
    public $batas_aman;
    public $batas_waspada;
    public $batas_bahaya;

    #[Title('Tambah Data Batas Poin')]

    public function tambah() {
      $data = $this->validate([
        'jenis_poin' => 'required',
        'batas_aman' => 'required',
        'batas_waspada' => 'required',
        'batas_bahaya' => 'required',
      ]);

      BatasPoin::create($data);

      session()->flash('success', 'Data berhasil ditambahkan');
      return $this->redirect('/batasPoin', true);
    }

    public function render()
    {
        return view('livewire.batas-poin.batas-poin-create');
    }
}
