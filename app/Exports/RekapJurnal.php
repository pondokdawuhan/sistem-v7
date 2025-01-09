<?php

namespace App\Exports;


use App\Models\User;
use App\Models\Jurnal;
use App\Models\Lembaga;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekapJurnal implements FromView
{
    public function view(): View
    {
      $lembaga = Lembaga::find(request('lembaga'));
       if (request('tanggalAwal') && request('tanggalAkhir')) {
            $jurnals = Jurnal::with('user', 'kelas', 'pelajaran')->where('lembaga_id', $lembaga->id)->whereBetween('created_at',[date('Y-m-d 00:00:00', strtotime(request('tanggalAwal'))), date('Y-m-d 23:59:59', strtotime(request('tanggalAkhir')))])->latest()->get();
          } else {
            $jurnals = Jurnal::with('user', 'kelas', 'pelajaran')->where('lembaga_id', $lembaga->id)->latest()->get();
          }
      return view('exports.rekapJurnal', [
        'title' => 'Rekap Jurnal',
        'jurnals' => $jurnals
      ]);
    }
}
