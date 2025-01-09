<?php

namespace App\Exports;


use App\Models\IzinPulangSantri;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekapIzinPulangSantri implements FromView
{
    public function view(): View
    {
        return view('exports.rekapIzinPulangSantri', [
          'izins' => IzinPulangSantri::with('santri')->whereBetween('waktu_mulai', [request()->tanggalAwal, request()->tanggalAkhir])->latest()->get()
        ]);
    }
}
