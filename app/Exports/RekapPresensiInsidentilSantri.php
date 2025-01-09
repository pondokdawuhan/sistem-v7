<?php

namespace App\Exports;

use App\Models\Kelas;
use Illuminate\Contracts\View\View;
use App\Models\PresensiInsidentilSantri;
use Maatwebsite\Excel\Concerns\FromView;

class RekapPresensiInsidentilSantri implements FromView
{
    public $tanggalAwal;
    public $tanggalAkhir;
    public $lembaga;

    public function __construct($tanggalAwal, $tanggalAkhir, $lembaga)
    {
      $this->tanggalAwal = $tanggalAwal;
      $this->tanggalAkhir = $tanggalAkhir;
      $this->lembaga = $lembaga;
    }

    public function view(): View
    {
     
      if ($this->tanggalAwal && $this->tanggalAkhir) {
          $presensis = PresensiInsidentilSantri::with('santri', 'user')->where('lembaga_id', $this->lembaga->id)->whereBetween('created_at',[date('Y-m-d 00:00:00', strtotime($this->tanggalAwal)), date('Y-m-d 23:59:59', strtotime($this->tanggalAkhir))])->latest()->get();
        } else {
          $presensis = PresensiInsidentilSantri::with('santri', 'user')->where('lembaga_id', $this->lembaga->id)->latest()->get();
        }

      return view('exports.rekapPresensiInsidentil', [
        'presensis' => $presensis,
        'kelas' => Kelas::all(),
        'lembaga' => $this->lembaga
      ]);
    }
}
