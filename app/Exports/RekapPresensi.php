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

class RekapPresensi implements FromView
{
    public $tanggalAwal;
    public $tanggalAkhir;
    public $lembaga;
    public $pelajaran;


    public function __construct($tanggalAwal, $tanggalAkhir, $lembaga, $pelajaran)
    {
      $this->tanggalAwal = $tanggalAwal;
      $this->tanggalAkhir = $tanggalAkhir;
      $this->lembaga = $lembaga;
      $this->pelajaran = $pelajaran;
    }

    public function view(): View
    {
      
      if ($this->tanggalAwal && $this->tanggalAkhir) {
        $queryPresensi = Presensi::where('lembaga_id', $this->lembaga->id)->whereBetween('created_at',[date('Y-m-d 00:00:00', strtotime($this->tanggalAwal)), date('Y-m-d 23:59:59', strtotime($this->tanggalAkhir))]);
      } else {
        $queryPresensi = Presensi::where('lembaga_id', $this->lembaga->id);
      }

      if ($this->pelajaran) {
          $queryPresensi2 = $queryPresensi->where('pelajaran_id', $this->pelajaran);
        } else {
          $queryPresensi2 = $queryPresensi;
        }

      return view('exports.rekapPresensi', [
        'presensis' => $queryPresensi2->latest()->get(),
      ]);
    }
}
