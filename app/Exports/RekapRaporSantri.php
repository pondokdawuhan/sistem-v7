<?php

namespace App\Exports;


use App\Models\Kelas;
use App\Models\Santri;
use App\Models\KelasMa;
use App\Models\KelasMmq;
use App\Models\KelasSmp;
use App\Models\KelasMadin;
use App\Models\PoinSantri;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekapRaporSantri implements FromView
{
    public $kelas;

    public function __construct($kelas)
    {
      $this->kelas = $kelas;
    }
    public function view(): View
    {
     if ($this->kelas == 'semua') {
          $querySantri = Santri::with('poinSantri', 'dataSantri')->santriAktif();
        } else {
          $kelas = Kelas::find($this->kelas);
          switch ($kelas->lembaga->jenis_lembaga) {
            case 'FORMAL':
              $querySantri = Santri::with('poinSantri', 'dataSantri')->santriAktif()->where('kelas_formal_id', $this->kelas);
              break;
            case 'MADIN':
              $querySantri = Santri::with('poinSantri', 'dataSantri')->santriAktif()->where('kelas_madin_id', $this->kelas);
              break;
            case 'MMQ':
              $querySantri = Santri::with('poinSantri', 'dataSantri')->santriAktif()->where('kelas_mmq_id', $this->kelas);
              break;
            case 'ASRAMA':
              $querySantri = Santri::with('poinSantri', 'dataSantri')->santriAktif()->where('kelas_asrama_id', $this->kelas);
              break;
            
          }
        }
      return view('exports.rekapRaporSantri', [
        'kelass' => Kelas::all(),
        'santris' => $querySantri->orderBy(PoinSantri::select('jumlah')->whereColumn('poin_santris.santri_id', 'santris.id'), 'desc')->santriAktif()->get(),
      ]);
    }
}
