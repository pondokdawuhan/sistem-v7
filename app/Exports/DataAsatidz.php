<?php

namespace App\Exports;


use App\Models\User;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DataAsatidz implements FromView
{
    public function view(): View
    {
      
      return view('exports.dataAsatidz', [
        'title' => 'Rekap Jurnal',
        'users' => User::with('dataUser')->get()
      ]);
    }
}
