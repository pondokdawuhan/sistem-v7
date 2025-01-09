<?php

namespace App\Livewire\Ekstrakurikuler;

use App\Models\Santri;
use Livewire\Component;
use App\Models\Ekstrakurikuler;

class EkstrakurikulerRombel extends Component
{
    public $ekstrakurikuler;
    public $rombel;
    public $deleteAnggotaRombel = [];

    public function mount(Ekstrakurikuler $ekstrakurikuler)
    {
      $this->ekstrakurikuler = $ekstrakurikuler;
    }

    public function tambahRombel()
    {
      
      $this->ekstrakurikuler->santri()->attach($this->rombel);

      session()->flash('success', 'Data Rombel berhasil ditambahkan');
      return $this->redirect('/ekstra/editRombel/'. $this->ekstrakurikuler->id, true);
    }

    public function resetAnggotaRombel()
    {
      $this->ekstrakurikuler->santri()->detach();

      session()->flash('success', 'Data Rombel berhasil direset');
      return $this->redirect('/ekstra/editRombel/'. $this->ekstrakurikuler->id, true);
    }

    public function destroyAnggotaRombel()
    {
      
      $this->ekstrakurikuler->santri()->detach($this->deleteAnggotaRombel);

      session()->flash('success', 'Data anggota rombel berhasil dihapus');
      return $this->redirect('/ekstra/editRombel/'. $this->ekstrakurikuler->id, true);
    }

    public function render()
    {

        return view('livewire.ekstrakurikuler.ekstrakurikuler-rombel', [
          'kelas' => $this->ekstrakurikuler,
          'anggotaKelas' => Santri::whereRelation('ekstrakurikuler', 'ekstrakurikuler_id', $this->ekstrakurikuler->id)->orderBy('name', 'asc')->get(),
          'santris' => Santri::all()
        ])->title('Data Rombel ' . $this->ekstrakurikuler->nama);
    }
}
