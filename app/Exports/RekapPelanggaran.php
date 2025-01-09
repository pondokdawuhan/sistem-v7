<?php

namespace App\Exports;

use App\Models\PelanggaranSantri;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekapPelanggaran implements FromView
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
        if($this->tanggalAwal && $this->tanggalAkhir){
          $pelanggarans = PelanggaranSantri::with('santri')->whereBetween('tanggal', [$this->tanggalAwal, $this->tanggalAkhir])->latest()->get();
        } else {
          $pelanggarans = PelanggaranSantri::with('santri')->latest()->get();
        }
        return view('exports.rekapPelanggaran', [
          'pelanggarans' => $pelanggarans
        ]);
    }
}
