<?php

namespace App\Livewire\RekapPresensiJumlah;

use App\Exports\RekapPresensiJumlah;
use App\Models\Kelas;
use App\Models\Santri;
use App\Models\Lembaga;
use Livewire\Component;
use App\Models\Presensi;
use App\Models\Pelajaran;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class RekapPresensiJumlahList extends Component
{
  public $lembaga;
  public $role;
  public $search;
  public $tanggalAwal;
  public $tanggalAkhir;
  public $selectedMapel;
  public $selectedKelas;

  public function mount(Lembaga $lembaga)
  {
    $this->lembaga = $lembaga;
    $this->role = explode('/', request()->path())[1];
  }

  public function download()
  {
    // $this->querySantris = Santri::select(['santris.name', 'santris.kelas_formal_id', DB::raw('COUNT(presensis.id) AS total')])->leftJoin('presensis', 'presensis.santri_id', '=', 'santris.id')->whereIn('kelas_formal_id', $kelas)->groupBy('santris.id')->orderBy('total', 'desc')->get();


    if ($this->selectedMapel != 'semua') {
      $mapel = Pelajaran::find($this->selectedMapel)->nama;
    } else {
      $mapel = 'Semua';
    }

    if ($this->selectedKelas != 'semua') {
      $kelas = Kelas::find($this->selectedKelas)->nama;
    } else {
      $kelas = 'Semua';
    }

    $title = "Rekap Presensi " . $this->lembaga->nama . ' mulai ' . date('d-m-Y', strtotime($this->tanggalAwal)) . ' sampai ' . date('d-m-Y', strtotime($this->tanggalAkhir)) . ' mapel ' . $mapel . ' kelas ' . $kelas  . '.xlsx';


    return Excel::download(new RekapPresensiJumlah($this->tanggalAwal, $this->tanggalAkhir, $this->lembaga, $this->selectedMapel, $this->selectedKelas), $title);
  }

  public function render()
  {

    if ($this->tanggalAwal && $this->tanggalAkhir && $this->selectedKelas && $this->selectedMapel) {
      $presensis = Presensi::where('lembaga_id', $this->lembaga->id)->whereBetween('created_at', [date('Y-m-d 00:00:00', strtotime($this->tanggalAwal)), date('Y-m-d 23:59:59', strtotime($this->tanggalAkhir))])->rekapMapel($this->selectedMapel)->rekapKelas($this->selectedKelas)->get();
    } else {
      $presensis = null;
    }

    if ($this->selectedKelas && $this->selectedKelas != 'semua') {
      $santris = Santri::kelas($this->lembaga->jenis_lembaga, $this->selectedKelas);
    } else {
      $kelas = Kelas::where('lembaga_id', $this->lembaga->id)->pluck('id')->toArray();

      switch ($this->lembaga->jenis_lembaga) {
        case 'FORMAL':
          $santris = Santri::whereIn('kelas_formal_id', $kelas);
          break;
        case 'MADIN':
          $santris = Santri::whereIn('kelas_madin_id', $kelas);
          break;
        case 'MMQ':
          $santris = Santri::whereIn('kelas_mmq_id', $kelas);
          break;
        case 'ASRAMA':
          $santris = Santri::whereIn('kelas_asrama_id', $kelas);
          break;
      }
    }


    if ($this->role == 'walikelas') {
      $queryKelas = Kelas::where('lembaga_id', $this->lembaga->id)->where('user_id', auth()->user()->id)->get();
      $queryMapels = Pelajaran::where('lembaga_id', $this->lembaga->id)->get();
    } elseif ($this->role == 'guru') {
      $queryKelas = auth()->user()->kelasMengajar;
      $queryMapels = auth()->user()->pelajaran;
    } else {
      $queryKelas = Kelas::where('lembaga_id', $this->lembaga->id)->get();
      $queryMapels = Pelajaran::where('lembaga_id', $this->lembaga->id)->get();
    }


    return view('livewire.rekap-presensi-jumlah.rekap-presensi-jumlah-list', [
      'presensis' => $presensis,
      'santris' => $santris->filter($this->search)->get(),
      'mapels' => $queryMapels,
      'kelass' => $queryKelas,
    ])->title('Rekap Presensi (Jumlah) ' . $this->lembaga->nama);
  }
}
