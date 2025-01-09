<?php

namespace App\Exports;

use App\Models\PembinaanSantri;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekapPembinaan implements FromView
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
          $pembinaans = PembinaanSantri::with('santri')->whereBetween('tanggal', [$this->tanggalAwal, $this->tanggalAkhir])->latest()->get();
        } else {
          $pembinaans = PembinaanSantri::with('santri')->latest()->get();
        }
        return view('exports.rekapPembinaan', [
          'pembinaans' => $pembinaans
        ]);
    }
}
