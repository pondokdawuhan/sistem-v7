<?php

namespace App\Livewire\Lembaga;

use App\Models\Lembaga;
use Livewire\Attributes\Title;
use Livewire\Component;

class LembagaEdit extends Component
{   
    public $lembaga;
    public $nama;
    public $nama_singkat;
    public $jenis_lembaga;
    public $jam;
    public function mount(Lembaga $lembaga)
    {
      $this->nama = $lembaga->nama;
      $this->nama_singkat = $lembaga->nama_singkat;
      $this->jenis_lembaga = $lembaga->jenis_lembaga;
      $this->jam = $lembaga->jam;

      $this->lembaga = $lembaga;
    }
    #[Title('Edit Lembaga')]

    public function editLembaga()
    {
      
      $data = $this->validate([
        'nama' => 'required',
        'nama_singkat' => 'required|min:3',
        'jenis_lembaga' => 'required',
        'jam' => 'required'
      ]);
      
      $this->lembaga->update($data);

      session()->flash('success', 'Data Lembaga berhasil diubah!');
      return $this->redirect('/lembaga', navigate:true);
    }

    public function render()
    {
        
        return view('livewire.lembaga.lembaga-edit', [
          'lembaga' => $this->lembaga
        ]);
    }
}
