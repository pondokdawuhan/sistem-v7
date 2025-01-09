<?php

namespace App\Livewire\Jurnal;

use App\Models\Kelas;
use App\Models\Jurnal;
use App\Models\Santri;
use Livewire\Component;
use App\Models\Presensi;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

class JurnalList extends Component
{
    use WithPagination;

    public $search;
    public $titleModal = '';
    public $selectedJurnal;
    public $selectedLembaga = 'semua';
    public $selectedGuruPiket = 'semua';
    public $presensis;
    public $jumlahAnggota;
    public $kelas;
    public $paginate = 20;
    public $page;

    public function lihat($id)
    {
      $jurnal = Jurnal::find($id);

        $presensis = Presensi::with('santri')->where('pelajaran_id', $jurnal->pelajaran_id)->where('kelas_id', $jurnal->kelas_id)->where('jam', $jurnal->jam)->whereDate('created_at', $jurnal->created_at)->get();
        $kelas = Kelas::find($jurnal->kelas_id);
          
          switch ($jurnal->lembaga->jenis_lembaga) {
            case 'FORMAL':
              $jumlahAnggota = Santri::where('kelas_formal_id', $jurnal->kelas_id)->get();
              break;
            case 'MADIN':
              $jumlahAnggota = Santri::where('kelas_madin_id', $jurnal->kelas_id)->get();
              break;
            case 'TPQ':
              $jumlahAnggota = Santri::where('kelas_tpq_id', $jurnal->kelas_id)->get();
              break;
        }

        $this->selectedJurnal = $jurnal;
        $this->presensis = $presensis;
        $this->kelas =  $kelas;
        $this->jumlahAnggota = $jumlahAnggota;
        $this->titleModal = 'Detail Jurnal';
    }

    public function render()
    {
        if ($this->search) {
          $this->page = 1;
          $jurnals = Jurnal::with('kelas', 'pelajaran', 'lembaga')->where('user_id', auth()->user()->id)->filter($this->search)->selectedLembaga($this->selectedLembaga)->guruPiket($this->selectedGuruPiket)->latest()->get();
        } else {
          $jurnals = Jurnal::with('kelas', 'pelajaran', 'lembaga')->where('user_id', auth()->user()->id)->filter($this->search)->selectedLembaga($this->selectedLembaga)->guruPiket($this->selectedGuruPiket)->latest()->paginate($this->paginate);
          $this->page = $jurnals->firstItem();
        }
        return view('livewire.jurnal.jurnal-list', [
          'jurnals' => $jurnals
        ])->title('Jurnal Mengajar ' . auth()->user()->name);
    }
}
