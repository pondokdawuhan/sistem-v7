<?php

namespace App\Livewire\CatatanSantri;

use App\Models\Santri;
use Livewire\Component;
use App\Models\CatatanSantri;
use Livewire\Attributes\Title;

class CatatanSantriCreate extends Component
{
    public $role;
    public $lembaga;
    public $santri_id = [];
    public $tanggal;
    public $catatan;
    public $kategori;
    public $masuk_rekomendasi;

    #[Title('Tambah Catatan Santri')]
    public function mount()
    {
      $this->role = explode('/', request()->path())[1];
      $this->lembaga = explode('/', request()->path())[0];
    }

    public function tambah()
    {
      $data = $this->validate([
        'santri_id' => 'required',
        'tanggal' => 'required',
        'catatan' => 'required',
        'kategori' => 'required',
        'masuk_rekomendasi' => 'required'
      ]);
      
      foreach ($data['santri_id'] as $santri_id) {
          CatatanSantri::create([
            'lembaga_id' => $this->lembaga,
            'santri_id' => $santri_id,
            'user_id' => auth()->user()->id,
            'tanggal' => $data['tanggal'],
            'catatan' => $data['catatan'],
            'kategori' => $data['kategori'],
            'masuk_rekomendasi' => $data['masuk_rekomendasi'],
          ]);
      }

      session()->flash('success', 'Data berhasil ditambahkan');

      return $this->redirect('/' . $this->lembaga . '/' . $this->role . '/catatanSantri', true);
    }

    public function render()
    {
        if ($this->role == 'pendamping' || $this->role == 'pengurus') {
          $santris = Santri::whereRelation('dataSantri', 'jenis_kelamin', auth()->user()->dataUser->jenis_kelamin)->get();
        } else {
          $santris = Santri::all();
        }
        return view('livewire.catatan-santri.catatan-santri-create', [
          'santris' => $santris
        ]);
    }
}
