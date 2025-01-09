<?php

namespace App\Livewire\RekapPelanggaran;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Exports\RekapPelanggaran;
use App\Models\PelanggaranSantri;
use Maatwebsite\Excel\Facades\Excel;

class RekapPelanggaranList extends Component
{
    #[Title('Rekap Pelanggaran')]

    public $tanggalAwal;
    public $tanggalAkhir;
    public $page;
    public $paginate = 20;
    public $search;
    public $role;

    public function mount()
    {
      $this->role = explode('/', request()->path())[0];
    }

    public function download()
    {
      if ($this->tanggalAwal && $this->tanggalAkhir) {
        $title = "Rekap Pelanggaran " . ' mulai ' . date('d-m-Y', strtotime($this->tanggalAwal)) . ' sampai ' . date('d-m-Y', strtotime($this->tanggalAkhir)) . '.xlsx';
        
      } else {
        $title = "Rekap Pelanggaran " . '.xlsx';
      }

      return Excel::download(new RekapPelanggaran($this->tanggalAwal, $this->tanggalAkhir), $title);
    }

    public function render()
    {

      if ($this->tanggalAwal && $this->tanggalAkhir) {
        $queryPelanggarans = PelanggaranSantri::with('santri', 'lembaga', 'referensiPoin')->whereBetween('tanggal', [$this->tanggalAwal, $this->tanggalAkhir]);
      } else {
        $queryPelanggarans = PelanggaranSantri::with('santri', 'lembaga', 'referensiPoin');
      }

      if ($this->search) {
          $this->page = 1;
          $pelanggarans = $queryPelanggarans->filter($this->search)->latest()->get();
        } else {
          $pelanggarans = $queryPelanggarans->latest()->paginate($this->paginate);
          $this->page = $pelanggarans->firstItem();
        }

        return view('livewire.rekap-pelanggaran.rekap-pelanggaran-list', [
          'pelanggarans' => $pelanggarans
        ]);
    }
}
