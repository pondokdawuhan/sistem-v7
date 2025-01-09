<?php

namespace App\Exports;


use App\Models\PresensiSholat;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekapPresensiSholat implements FromView
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
        $presensis = PresensiSholat::with('santri', 'user')->where('lembaga_id', $this->lembaga->id)->whereBetween('created_at',[date('Y-m-d 00:00:00', strtotime($this->tanggalAwal)), date('Y-m-d 23:59:59', strtotime($this->tanggalAkhir))])->filter(request('keyword'))->latest()->get();
      } else {
        $presensis = PresensiSholat::with('santri', 'user')->where('lembaga_id', $this->lembaga->id)->filter(request('keyword'))->latest()->get();
      }

      return view('exports.rekapPresensiSholat', [
        'presensis' => $presensis
      ]);
    }
}
