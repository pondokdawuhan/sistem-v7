<?php

namespace App\Livewire\Lembaga;

use App\Models\Lembaga;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Features\SupportNavigate\SupportNavigate;

class LembagaCreate extends Component
{
  #[Title('Tambah Lembaga')]
    public $nama;
    public $nama_singkat;
    public $jenis_lembaga;
    public $jam;

    public function postLembaga()
    {
      $data = $this->validate([
        'nama' => 'required',
        'nama_singkat' => 'required|min:3',
        'jenis_lembaga' => 'required',
        'jam' => 'required'
      ]);
      
      Lembaga::create($data);

      session()->flash('success', 'Data Lembaga berhasil ditambahkan!');
      return $this->redirect('/lembaga', navigate:true);
    }

    public function render()
    {
        return view('livewire.lembaga.lembaga-create');
    }
}
