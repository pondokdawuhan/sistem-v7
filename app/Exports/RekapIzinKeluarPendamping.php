<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use App\Models\IzinKeluarPendamping;
use Maatwebsite\Excel\Concerns\FromView;

class RekapIzinKeluarPendamping implements FromView
{
    public function view(): View
    {
        return view('exports.rekapIzinKeluarPendamping', [
          'izins' => IzinKeluarPendamping::with('user')->whereBetween('waktu_mulai', [request()->tanggalAwal, request()->tanggalAkhir])->latest()->get()
        ]);
    }
}
