<?php

namespace App\Livewire\BatasPoin;

use App\Models\BatasPoin;
use Livewire\Component;
use Livewire\Attributes\Title;

class BatasPoinEdit extends Component
{

    public $jenis_poin;
    public $batas_aman;
    public $batas_waspada;
    public $batas_bahaya;

    public $batasPoin;

    #[Title('Edit Data Batas Poin')]

    public function mount(BatasPoin $batasPoin)
    {
      $this->batasPoin = $batasPoin;
      $this->jenis_poin = $batasPoin->jenis_poin;
      $this->batas_aman = $batasPoin->batas_aman;
      $this->batas_waspada = $batasPoin->batas_waspada;
      $this->batas_bahaya = $batasPoin->batas_bahaya;
    }

    public function edit() {
      $data = $this->validate([
        'jenis_poin' => 'required',
        'batas_aman' => 'required',
        'batas_waspada' => 'required',
        'batas_bahaya' => 'required',
      ]);

      $this->batasPoin->update($data);

      session()->flash('success', 'Data berhasil diubah');
      return $this->redirect('/batasPoin', true);
    }

    public function render()
    {
        return view('livewire.batas-poin.batas-poin-edit');
    }
}
