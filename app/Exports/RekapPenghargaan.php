<?php

namespace App\Exports;

use App\Models\PenghargaanSantri;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekapPenghargaan implements FromView
{
    public $tanggalAwal;
    public $tanggalAkhir;

    public function __construct($tanggalAwal, $tanggalAkhir)
    {
      $this->tanggalAwal = $tanggalAwal;
      $this->tanggalAkhir = $tanggalAkhir;
    }

    public function view(): View
    {
        if ($this->tanggalAwal && $this->tanggalAkhir) {
          $penghargaans = PenghargaanSantri::with('santri')->whereBetween('tanggal', [request()->tanggalAwal, request()->tanggalAkhir])->latest()->get();
        } else {
          $penghargaans = PenghargaanSantri::with('santri')->latest()->get();
        }
        return view('exports.rekapPenghargaan', [
          'penghargaans' => $penghargaans
        ]);
    }
}
