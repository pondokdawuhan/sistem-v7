<?php

namespace App\Livewire\PresensiKegiatanAsatidz;

use App\Exports\RekapPresensiKegiatanAsatidz;
use App\Models\Lembaga;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PresensiKegiatanAsatidz;

class PresensiKegiatanAsatidzList extends Component
{
    public $lembaga;
    public $role;
    public $page;
    public $paginate = 20;
    public $search;

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
        $title = "Rekap Presensi Kegiatan Asatidz " . $this->lembaga->nama . ' mulai ' . date('d-m-Y', strtotime($this->tanggalAwal)) . ' sampai ' . date('d-m-Y', strtotime($this->tanggalAkhir)) . '.xlsx';
        
      } else {
        $title = "Rekap Presensi Kegiatan Asatidz " . $this->lembaga->nama . '.xlsx';
      }

      return Excel::download(new RekapPresensiKegiatanAsatidz($this->tanggalAwal, $this->tanggalAkhir, $this->lembaga), $title);
    }

    public function render()
    {
        if ($this->tanggalAwal && $this->tanggalAkhir) {
          $queryPresensis = PresensiKegiatanAsatidz::with('user')->where('lembaga_id', $this->lembaga->id)->whereBetween('created_at',[date('Y-m-d 00:00:00', strtotime($this->tanggalAwal)), date('Y-m-d 23:59:59', strtotime($this->tanggalAkhir))]);
        } else {
          $queryPresensis = PresensiKegiatanAsatidz::with('user')->where('lembaga_id', $this->lembaga->id);
        }

        if ($this->search) {
          $presensis = $queryPresensis->filter($this->search)->latest()->get();
        } else {
          $presensis = $queryPresensis->latest()->paginate($this->paginate);
        }

        return view('livewire.presensi-kegiatan-asatidz.presensi-kegiatan-asatidz-list', [
          'presensis' => $presensis,
        ])->title('Presensi Kegiatan Asatidz ' . $this->lembaga->nama);
    }
}
