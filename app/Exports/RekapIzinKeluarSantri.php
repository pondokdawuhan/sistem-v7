<?php

namespace App\Exports;

use App\Models\IzinKeluarSantri;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekapIzinKeluarSantri implements FromView
{
    public function view(): View
    {
        return view('exports.rekapIzinKeluarSantri', [
          'izins' => IzinKeluarSantri::with('santri')->whereBetween('waktu_mulai', [request()->tanggalAwal, request()->tanggalAkhir])->latest()->get()
        ]);
    }
}
