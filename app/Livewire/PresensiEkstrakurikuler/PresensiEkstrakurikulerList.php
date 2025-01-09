<?php

namespace App\Livewire\PresensiEkstrakurikuler;

use App\Models\Santri;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Ekstrakurikuler;
use App\Models\JurnalEkstrakurikuler;
use App\Models\PresensiEkstrakurikuler;

class PresensiEkstrakurikulerList extends Component
{
    use WithPagination;
    public $page;
    public $paginate = 20;
    public $search;
    public $ekstrakurikuler;

    public $titleModal;
    public $selectedJurnal;
    public $presensis;
    public $jumlahAnggota;

    public function mount(Ekstrakurikuler $ekstrakurikuler)
    {
      $this->ekstrakurikuler = $ekstrakurikuler;
    }

    public function lihat($id)
    {
      $this->titleModal = 'Daftar Hadir';

      $jurnal = JurnalEkstrakurikuler::find($id);
      $this->selectedJurnal = $jurnal;

      $presensis = PresensiEkstrakurikuler::where('ekstrakurikuler_id', $jurnal->ekstrakurikuler_id)->where('user_id', auth()->user()->id)->whereDate('created_at', $jurnal->created_at)->get();
      $this->presensis = $presensis;

      $jmlAnggota = Santri::whereRelation('ekstrakurikuler', 'ekstrakurikuler_id', $jurnal->ekstrakurikuler_id)->get();
      $this->jumlahAnggota = $jmlAnggota;
    }

    public function render()
    {
        if ($this->search) {
          $jurnals = JurnalEkstrakurikuler::where('ekstrakurikuler_id', $this->ekstrakurikuler->id)->filter($this->search)->whereRelation('user', 'id', auth()->user()->id)->latest()->get();
          $this->page = 1;
        } else {
          $jurnals = JurnalEkstrakurikuler::where('ekstrakurikuler_id', $this->ekstrakurikuler->id)->whereRelation('user', 'id', auth()->user()->id)->latest()->paginate($this->paginate);
          $this->page = $jurnals->firstItem();
        }
        return view('livewire.presensi-ekstrakurikuler.presensi-ekstrakurikuler-list', [
          'jurnals' => $jurnals
        ])->title('Presensi Ekstrakurikuler ' . $this->ekstrakurikuler->nama);
    }
}
