<?php

namespace App\Livewire\PresensiInsidentilSantri;

use App\Exports\RekapPresensiInsidentilSantri;
use App\Models\Kelas;
use App\Models\Lembaga;
use App\Models\PresensiInsidentilSantri;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class PresensiInsidentilSantriList extends Component
{
    use WithPagination;

    public $page;
    public $paginate = 20;
    public $search;

    public $lembaga;
    public $role;

    public $tanggalAwal;
    public $tanggalAkhir;

    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
    }

    public function download()
    {
      if ($this->tanggalAwal && $this->tanggalAkhir) {
        $title = "Rekap Presensi Insidentil Santri " . $this->lembaga->nama . ' mulai ' . date('d-m-Y', strtotime($this->tanggalAwal)) . ' sampai ' . date('d-m-Y', strtotime($this->tanggalAkhir)) . '.xlsx';
        
      } else {
        $title = "Rekap Presensi Insidentil Santri " . $this->lembaga->nama . '.xlsx';
      }

      return Excel::download(new RekapPresensiInsidentilSantri($this->tanggalAwal, $this->tanggalAkhir, $this->lembaga), $title);
    }


    public function render()
    {
        if ($this->tanggalAwal && $this->tanggalAkhir) {
          $queryPresensis = PresensiInsidentilSantri::with('santri', 'user')->where('lembaga_id', $this->lembaga->id)->whereBetween('created_at',[date('Y-m-d 00:00:00', strtotime($this->tanggalAwal)), date('Y-m-d 23:59:59', strtotime($this->tanggalAkhir))]);
        } else {
          $queryPresensis = PresensiInsidentilSantri::with('santri', 'user')->where('lembaga_id', $this->lembaga->id);
        }

        if ($this->search) {
          $presensis = $queryPresensis->filter($this->search)->latest()->get();
        } else {
          $presensis = $queryPresensis->latest()->paginate($this->paginate);
        }

        return view('livewire.presensi-insidentil-santri.presensi-insidentil-santri-list', [
          'presensis' => $presensis,
          'kelas' => Kelas::all()
        ])->title('Presensi Insidentil Santri ' . $this->lembaga->nama);
    }
}
