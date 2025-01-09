<?php

namespace App\Livewire\Pelajaran;

use App\Models\Lembaga;
use Livewire\Component;
use App\Models\Pelajaran;

class PelajaranList extends Component
{
    public $search;
    public $lembaga;
    public $pelajaran_id;
    public $nama_edit;
    public $nama;
    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
    }

    public function tambah()
    {
      Pelajaran::create([
        'lembaga_id' => $this->lembaga->id,
        'nama' => $this->nama
      ]);

      session()->flash('success', 'Data Pelajaran berhasil ditambahkan');
      return redirect('/pelajaran/' . $this->lembaga->id);
    }

    public function edit()
    {
      Pelajaran::find($this->pelajaran_id)->update(['nama' => $this->nama_edit]);
      session()->flash('success', 'Data Pelajaran berhasil diubah');
      return redirect('/pelajaran/' . $this->lembaga->id);
    }

    public function delete(Pelajaran $pelajaran)
    {
      $pelajaran->delete();

      session()->flash('success', 'Data Pelajaran berhasil dihapus');
      return redirect('/pelajaran/' . $this->lembaga->id);
    }

    public function render()
    {   
      
        return view('livewire.pelajaran.pelajaran-list', [
          'pelajarans' => Pelajaran::where('lembaga_id', $this->lembaga->id)->where('nama', 'like', '%' . $this->search . '%')->latest()->get()
        ])->title('Data Pelajaran ' . $this->lembaga->nama);
    }
}
