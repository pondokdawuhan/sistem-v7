<?php

namespace App\Livewire\PresensiSholat;

use App\Models\Kelas;
use App\Models\Lembaga;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PresensiSholat;
use App\Models\JurnalSholatSantri;
use App\Exports\RekapPresensiSholat;
use Maatwebsite\Excel\Facades\Excel;

class PresensiSholatList extends Component
{
    use WithPagination;

    public $lembaga;
    public $role;
    public $page;
    public $paginate = 20;
    public $search;
    public $tanggalAwal;
    public $tanggalAkhir;
    public $selectedDate;
   

    public function mount(Lembaga $lembaga)
    {
      $this->role = explode('/', request()->path())[1];
      $this->lembaga = $lembaga;
      $this->selectedDate = date('Y-m-d', time());
    }


    public function download()
    {
      if ($this->tanggalAwal && $this->tanggalAkhir) {
        $title = "Rekap Presensi Sholat " . $this->lembaga->nama . ' mulai ' . date('d-m-Y', strtotime($this->tanggalAwal)) . ' sampai ' . date('d-m-Y', strtotime($this->tanggalAkhir)) . '.xlsx';
        
      } else {
        $title = "Rekap Presensi Sholat " . $this->lembaga->nama . '.xlsx';
      }
      
      return Excel::download(new RekapPresensiSholat($this->tanggalAwal, $this->tanggalAkhir, $this->lembaga), $title);
    }

    public function render()
    {
      
      if ($this->tanggalAwal && $this->tanggalAkhir) {
        $presensi = PresensiSholat::with('santri', 'user')->where('lembaga_id', $this->lembaga->id)->whereBetween('created_at',[date('Y-m-d 00:00:00', strtotime($this->tanggalAwal)), date('Y-m-d 23:59:59', strtotime($this->tanggalAkhir))]);
      } else {
        $presensi = PresensiSholat::with('santri', 'user')->where('lembaga_id', $this->lembaga->id);
      }

      if ($this->search) {
        $this->page = 1;
        $presensis = $presensi->filter($this->search)->latest()->get();
      } else {
        $presensis = $presensi->latest()->paginate($this->paginate);
        $this->page = $presensis->firstItem();
      }


        return view('livewire.presensi-sholat.presensi-sholat-list', [
          'presensis' => $presensis,
          'kelass' => Kelas::where('lembaga_id', $this->lembaga->id)->get(),
        ])->title('Presensi Sholat');
    }
}
