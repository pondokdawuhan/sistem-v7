<?php

namespace App\Livewire\RekapPresensi;

use App\Models\Lembaga;
use Livewire\Component;
use App\Models\Presensi;
use App\Exports\RekapPresensi;
use App\Models\Pelajaran;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class RekapPresensiList extends Component
{
    use WithPagination;
    
    public $lembaga;
    public $role;
    public $page;
    public $paginate = 20;
    public $search;
    public $tanggalAwal;
    public $tanggalAkhir;
    public $pelajaran;

    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
    }

    public function download()
    {
      if ($this->tanggalAwal && $this->tanggalAkhir) {
        $title = "Rekap Presensi " . $this->lembaga->nama . ' mulai ' . date('d-m-Y', strtotime($this->tanggalAwal)) . ' sampai ' . date('d-m-Y', strtotime($this->tanggalAkhir)) . '.xlsx';
        
      } else {
        $title = "Rekap Presensi " . $this->lembaga->nama . '.xlsx';
      }

      return Excel::download(new RekapPresensi($this->tanggalAwal, $this->tanggalAkhir, $this->lembaga, $this->pelajaran), $title);
    }

    public function render()
    {
        if ($this->tanggalAwal && $this->tanggalAkhir) {
          $queryPresensi = Presensi::with('lembaga', 'user', 'santri', 'kelas', 'pelajaran')->where('lembaga_id', $this->lembaga->id)->whereBetween('created_at',[date('Y-m-d 00:00:00', strtotime($this->tanggalAwal)), date('Y-m-d 23:59:59', strtotime($this->tanggalAkhir))]);
        } else {
          $queryPresensi = Presensi::with('lembaga', 'user', 'santri', 'kelas', 'pelajaran')->where('lembaga_id', $this->lembaga->id);
        }

        if ($this->pelajaran) {
          $queryPresensi2 = $queryPresensi->where('pelajaran_id', $this->pelajaran);
        } else {
          $queryPresensi2 = $queryPresensi;
        }

        if ($this->search) {
          $this->page = 1;
         $presensis = $queryPresensi2->filter($this->search)->latest()->get();
        } else {
          $presensis = $queryPresensi2->latest()->paginate($this->paginate);
          $this->page = $presensis->firstItem();
        }
        return view('livewire.rekap-presensi.rekap-presensi-list', [
          'presensis' => $presensis,
          'mapels' => Pelajaran::where('lembaga_id', $this->lembaga->id)->get()
        ])->title('Rekap Presensi ' . $this->lembaga->nama);
    }
}
