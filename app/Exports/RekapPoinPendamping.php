<?php

namespace App\Exports;

use App\Models\PoinPendamping;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekapPoinPendamping implements FromView
{
    public function view(): View
    {
      
        return view('exports.rekapPoinPendamping', [
          'poins' => PoinPendamping::with('user')->orderBy('jumlah', 'desc')->get()
        ]);
    }
}
