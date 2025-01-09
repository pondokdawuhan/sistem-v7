<?php

namespace App\Exports;

use App\Models\User;
use App\Models\JurnalMa;
use App\Models\JurnalMmq;
use App\Models\JurnalSmp;
use App\Models\JurnalMadin;
use App\Models\IzinAsatidzMa;
use App\Models\IzinAsatidzMmq;
use App\Models\IzinAsatidzSmp;
use App\Models\IzinAsatidzMadin;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekapRaporAsatidz implements FromView
{
    public function view(): View
    {
      switch (request()->lembaga) {
      case 'SMP':
        if (request()->bulan && request()->tahun) {
          $jurnals = JurnalSmp::whereYear('created_at', request()->tahun)->whereMonth('created_at', request()->bulan)->get();
          $izins = IzinAsatidzSmp::whereYear('created_at', request()->tahun)->whereMonth('created_at', request()->bulan)->get();
        } else {
          $jurnals = JurnalSmp::whereYear('created_at', date('Y', time()))->whereMonth('created_at', date('n', time()))->get();
          $izins = IzinAsatidzSmp::whereYear('created_at', date('Y', time()))->whereMonth('created_at', date('n', time()))->get();
        }
        break;

      case 'MA':
        if (request()->bulan && request()->tahun) {
          $jurnals = JurnalMa::whereYear('created_at', request()->tahun)->whereMonth('created_at', request()->bulan)->get();
          $izins = IzinAsatidzMa::whereYear('created_at', request()->tahun)->whereMonth('created_at', request()->bulan)->get();
        } else {
          $jurnals = JurnalMa::whereYear('created_at', date('Y', time()))->whereMonth('created_at', date('n', time()))->get();
          $izins = IzinAsatidzMa::whereYear('created_at', date('Y', time()))->whereMonth('created_at', date('n', time()))->get();
        }
        break;

      case 'MADIN':
        if (request()->bulan && request()->tahun) {
          $jurnals = JurnalMadin::whereYear('created_at', request()->tahun)->whereMonth('created_at', request()->bulan)->get();
          $izins = IzinAsatidzMadin::whereYear('created_at', request()->tahun)->whereMonth('created_at', request()->bulan)->get();
        } else {
          $jurnals = JurnalMadin::whereYear('created_at', date('Y', time()))->whereMonth('created_at', date('n', time()))->get();
          $izins = IzinAsatidzMadin::whereYear('created_at', date('Y', time()))->whereMonth('created_at', date('n', time()))->get();
        }
        break;

      case 'MMQ':
        if (request()->bulan && request()->tahun) {
          $jurnals = JurnalMmq::whereYear('created_at', request()->tahun)->whereMonth('created_at', request()->bulan)->get();
          $izins = IzinAsatidzMmq::whereYear('created_at', request()->tahun)->whereMonth('created_at', request()->bulan)->get();
        } else {
          $jurnals = JurnalMmq::whereYear('created_at', date('Y', time()))->whereMonth('created_at', date('n', time()))->get();
          $izins = IzinAsatidzMmq::whereYear('created_at', date('Y', time()))->whereMonth('created_at', date('n', time()))->get();
        }
        break;
      
    }

    $bulan = request()->bulan ?? date('n', time());
    $tahun = request()->tahun ?? date('Y', time());

    $pekanEfektif = pekanEfektif($bulan, $tahun);
        return view('exports.rekapRaporAsatidz', [
          'users' => User::with('jadwalPelajaranSmp', 'jadwalPelajaranMa', 'jadwalPelajaranMadin', 'jadwalPelajaranMmq',)->whereRelation('lembaga', 'name', request()->lembaga)->orderBy('name', 'asc')->get(),
          'pekanEfektif' => $pekanEfektif,
          'jurnals' => $jurnals,
          'izins' => $izins
        ]);
    }
}
