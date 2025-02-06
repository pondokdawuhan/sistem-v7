<?php

namespace App\Exports;


use App\Models\Kelas;
use App\Models\Santri;
use App\Models\KelasMa;
use App\Models\Lembaga;
use App\Models\KelasMmq;
use App\Models\KelasSmp;
use App\Models\Presensi;
use App\Models\Pelajaran;
use App\Models\KelasMadin;
use App\Models\PresensiMa;
use App\Models\PresensiMmq;
use App\Models\PresensiSmp;
use Illuminate\Http\Request;
use App\Models\PresensiMadin;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Request as FacadesRequest;

class RekapPresensiJumlah implements FromView
{
  public $tanggalAwal;
  public $tanggalAkhir;
  public $kelas;
  public $lembaga;
  public $pelajaran;


  public function __construct($tanggalAwal, $tanggalAkhir, $lembaga, $pelajaran, $kelas)
  {
    $this->tanggalAwal = $tanggalAwal;
    $this->tanggalAkhir = $tanggalAkhir;
    $this->lembaga = $lembaga;
    $this->pelajaran = $pelajaran;
    $this->kelas = $kelas;
  }

  public function view(): View
  {

    if ($this->tanggalAwal && $this->tanggalAkhir) {
      $presensis = Presensi::where('lembaga_id', $this->lembaga->id)->whereBetween('created_at', [date('Y-m-d 00:00:00', strtotime($this->tanggalAwal)), date('Y-m-d 23:59:59', strtotime($this->tanggalAkhir))])->rekapMapel($this->pelajaran)->rekapKelas($this->kelas)->get();
    } else {
      $presensis = null;
    }

    if ($this->kelas != 'semua') {
      $santris = Santri::kelas($this->lembaga->jenis_lembaga, $this->kelas);
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


    return view('exports.rekapPresensiJumlah', [
      'presensis' => $presensis,
      'santris' => $santris->get(),
      'mapels' => Pelajaran::where('lembaga_id', $this->lembaga->id)->get(),
      'kelass' => Kelas::where('lembaga_id', $this->lembaga->id)->get(),
      'lembaga' => $this->lembaga
    ]);
  }
}
