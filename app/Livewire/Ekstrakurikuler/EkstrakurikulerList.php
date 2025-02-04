<?php

namespace App\Livewire\Ekstrakurikuler;

use App\Models\Ekstrakurikuler;
use App\Models\User;
use Livewire\Component;

class EkstrakurikulerList extends Component
{
  public $search;
  public $nama;
  public $nama_edit;
  public $ekstra_id;
  public $pengampu;
  public $ekstra;

  public function tambah()
  {
    Ekstrakurikuler::create(['nama' => $this->nama]);

    session()->flash('success', 'Data Ekstrakurikuler berhasil ditambahkan');
    return $this->redirect('/ekstrakurikuler', true);
  }

  public function edit()
  {
    Ekstrakurikuler::find($this->ekstra_id)->update(['nama' => $this->nama_edit]);

    session()->flash('success', 'Data Ekstrakurikuler berhasil diubah');
    return $this->redirect('/ekstrakurikuler', true);
  }

  public function editPengampu()
  {
    $this->ekstra = Ekstrakurikuler::find($this->ekstra_id);
    $this->ekstra->update(['user_id' => $this->pengampu]);

    session()->flash('success', 'Data Pengampu Ekstrakurikuler ' . $this->ekstra->nama . ' berhasil diubah');
    return $this->redirect('/ekstrakurikuler', true);
  }

  public function delete($id)
  {
    $ekstra = Ekstrakurikuler::find($id);

    $ekstra->santri()->detach();

    $ekstra->delete();

    session()->flash('success', 'Data Ekstrakurikuler berhasil dihapus');
    return $this->redirect('/ekstrakurikuler', true);
  }

  public function render()
  {
    return view('livewire.ekstrakurikuler.ekstrakurikuler-list', [
      'ekstrakurikulers' => Ekstrakurikuler::with('user')->filter($this->search)->latest()->get(),
      'usersWali' => User::orderBy('name', 'asc')->get()
    ])->title('Data Ekstrakurikuler');
  }
}
