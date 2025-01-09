<?php

namespace App\Livewire\ReferensiPoin;

use App\Models\ReferensiPoin;
use Livewire\Component;

class ReferensiPoinList extends Component
{
    public $search;
    public $nama;
    public $nama_edit;
    public $referensiPoin_id;

    public function tambah()
    {
      ReferensiPoin::create(['name' => $this->nama]);

      session()->flash('success', 'Data Referensi Poin berhasil ditambah');
      return $this->redirect('/referensiPoin', true);
    }

    public function edit()
    {
      ReferensiPoin::find($this->referensiPoin_id)->update(['name' => $this->nama_edit]);
      session()->flash('success', 'Data Referensi Poin berhasil diubah');
      return $this->redirect('/referensiPoin', true);
    }

    public function delete($id)
    {
      ReferensiPoin::find($id)->delete();

       session()->flash('success', 'Data Referensi Poin berhasil dihapus');
      return $this->redirect('/referensiPoin', true);
    }

    public function render()
    {
        return view('livewire.referensi-poin.referensi-poin-list', [
          'referensiPoins' => ReferensiPoin::where('name', 'like', '%' . $this->search . '%')->latest()->get()
        ])->title('Data Referensi Poin');
    }
}
