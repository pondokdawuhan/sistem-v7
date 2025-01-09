<?php

namespace App\Livewire\PenguranganPoin;

use App\Models\PenguranganPoin;
use Livewire\Attributes\Title;
use Livewire\Component;

class PenguranganPoinEdit extends Component
{
    #[Title('Edit Pengurangan Poin')]

    public $penguranganPoin;
    public $tanggal;
    public $keterangan;
    public $poin_dikurangi;
    public $santri_name;
    public $role;
    public $lembaga;

    public function mount(PenguranganPoin $penguranganPoin)
    {
      $this->role = explode('/', request()->path())[1];
      $this->lembaga = explode('/', request()->path())[0];
      $this->penguranganPoin = $penguranganPoin;
      $this->santri_name = $penguranganPoin->santri->name;
      $this->tanggal = $penguranganPoin->tanggal;
      $this->keterangan = $penguranganPoin->keterangan;
      $this->poin_dikurangi = $penguranganPoin->poin_dikurangi;
    }

    public function edit()
    {
      $data = $this->validate([
            'tanggal' => 'required',
            'keterangan' => 'required',
            'poin_dikurangi' => 'required'
          ]);

          $this->penguranganPoin->update($data);

          session()->flash('success', 'Data berhasil diubah');
          return $this->redirect('/'. $this->lembaga . '/' . $this->role .'/penguranganPoin', true);
    }

    public function render()
    {
        return view('livewire.pengurangan-poin.pengurangan-poin-edit');
    }
}
