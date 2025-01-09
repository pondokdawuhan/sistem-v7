<?php

namespace App\Exports;

use App\Models\PoinSantri;
use App\Models\Santri;
use App\Models\PresensiMa;
use App\Models\PresensiMmq;
use App\Models\PresensiSmp;
use App\Models\PresensiMadin;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekapPoinSantri implements FromView
{
    public function view(): View
    {
      
        return view('exports.rekapPoinSantri', [
          'poins' => PoinSantri::with('santri')->orderBy('jumlah', 'desc')->get()
        ]);
    }
}
