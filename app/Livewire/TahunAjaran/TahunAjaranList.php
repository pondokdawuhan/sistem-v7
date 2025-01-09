<?php

namespace App\Livewire\TahunAjaran;

use App\Models\TahunAjaran;
use Livewire\Attributes\Title;
use Livewire\Component;

class TahunAjaranList extends Component
{
    #[Title('Tahun Ajaran')]

    public $tahun;
    public $tahunAjaran_edit;
    public $tahunAjaran_id;

    public function tambah()
    {
      TahunAjaran::create(['tahun' => $this->tahun]);

      session()->flash('success', 'Data berhasil ditambahkan');
      return $this->redirect('/tahunAjaran', true);
    }

    public function edit()
    {
      TahunAjaran::find($this->tahunAjaran_id)->update(['tahun' => $this->tahunAjaran_edit]);

      session()->flash('success', 'Data berhasil diubah');
      return $this->redirect('/tahunAjaran', true);
    }

    public function delete($id)
    {
      TahunAjaran::find($id)->delete();

      session()->flash('success', 'Data berhasil dihapus');
      return $this->redirect('/tahunAjaran', true);
    }

    public function render()
    {
        return view('livewire.tahun-ajaran.tahun-ajaran-list', [
          'tahunAjarans' => TahunAjaran::latest()->get()
        ]);
    }
}
