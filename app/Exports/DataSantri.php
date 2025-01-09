<?php

namespace App\Exports;

use App\Models\Kelas;
use App\Models\Santri;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DataSantri implements FromView
{
    public function view(): View
    {
      
      return view('exports.dataSantri', [
        'title' => 'Data Santri',
        'santris' => Santri::with('dataSantri')->get(),
        'kelas' => Kelas::all()
      ]);
    }
}
