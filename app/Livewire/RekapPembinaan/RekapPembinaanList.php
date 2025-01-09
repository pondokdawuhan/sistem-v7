<?php

namespace App\Livewire\RekapPembinaan;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Exports\RekapPembinaan;
use App\Models\PembinaanSantri;
use Maatwebsite\Excel\Facades\Excel;

class RekapPembinaanList extends Component
{
    use WithPagination;

    #[Title('Rekap Pembinaan Santri')]

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
        $judul = 'Rekap Pelanggaran Mulai '. date('d-m-Y', strtotime($this->tanggalAwal)) .' Sampai '. date('d-m-Y', strtotime($this->tanggalAkhir)) .'.xlsx';
      } else {
        $judul = 'Rekap Pelanggaran.xlsx';
      }

      return Excel::download(new RekapPembinaan($this->tanggalAwal, $this->tanggalAkhir), $judul);
    }

    public function render()
    {

      if ($this->tanggalAwal && $this->tanggalAkhir) {
        $queryPembinaan = PembinaanSantri::with('santri')->whereBetween('tanggal', [$this->tanggalAwal, $this->tanggalAkhir]);
      } else {
        $queryPembinaan = PembinaanSantri::with('santri');
      }

      if ($this->search) {
          $this->page = 1;
          $pembinaans = $queryPembinaan->filter($this->search)->latest()->get();
        } else {
          $pembinaans = $queryPembinaan->latest()->paginate($this->paginate);
          $this->page = $pembinaans->firstItem();
        }

        return view('livewire.rekap-pembinaan.rekap-pembinaan-list', [
          'pembinaans' => $pembinaans
        ]);
    }
}
