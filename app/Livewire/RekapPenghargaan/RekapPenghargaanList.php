<?php

namespace App\Livewire\RekapPenghargaan;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Exports\RekapPenghargaan;
use App\Models\PenghargaanSantri;
use Maatwebsite\Excel\Facades\Excel;

class RekapPenghargaanList extends Component
{
    use WithPagination;

    #[Title('Rekap Penghargaan')]

    public $page;
    public $paginate = 20;
    public $search;
    public $role;

    public $tanggalAwal;
    public $tanggalAkhir;

    public function mount()
    {
      $this->role = explode('/', request()->path())[0];
    }

    public function download()
    {
      if ($this->tanggalAwal && $this->tanggalAkhir) {
        $judul = 'Rekap Penghargaan Mulai '. date('d-m-Y', strtotime($this->tanggalAwal)) .' Sampai '. date('d-m-Y', strtotime($this->tanggalAkhir)) .'.xlsx';
      } else {
        $judul = 'Rekap Penghargaan.xlsx';
      }

      return Excel::download(new RekapPenghargaan($this->tanggalAwal, $this->tanggalAkhir), $judul);
    }

    public function render()
    {

      if ($this->tanggalAwal && $this->tanggalAkhir) {
        $queryPenghargaans = PenghargaanSantri::with('santri')->whereBetween('tanggal', [$this->tanggalAwal, $this->tanggalAkhir]);
      } else {
        $queryPenghargaans = PenghargaanSantri::with('santri');
      }

      if ($this->search) {
          $this->page = 1;
          $penghargaans = $queryPenghargaans->filter($this->search)->latest()->get();
        } else {
          $penghargaans = $queryPenghargaans->latest()->paginate($this->paginate);
          $this->page = $penghargaans->firstItem();
        }
        return view('livewire.rekap-penghargaan.rekap-penghargaan-list', [
          'penghargaans' => $penghargaans
        ]);
    }
}
