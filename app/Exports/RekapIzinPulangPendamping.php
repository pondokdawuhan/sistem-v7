<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use App\Models\IzinKeluarPendamping;
use App\Models\IzinPulangPendamping;
use Maatwebsite\Excel\Concerns\FromView;

class RekapIzinPulangPendamping implements FromView
{
    public function view(): View
    {
        return view('exports.rekapIzinPulangPendamping', [
          'izins' => IzinPulangPendamping::with('user')->whereBetween('waktu_mulai', [request()->tanggalAwal, request()->tanggalAkhir])->latest()->get()
        ]);
    }
}
