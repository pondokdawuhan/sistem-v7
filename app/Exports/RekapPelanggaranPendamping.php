<?php

namespace App\Exports;

use App\Models\PelanggaranPendamping;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekapPelanggaranPendamping implements FromView
{
    public function view(): View
    {
      if (request('tanggalAwal') && request('tanggalAkhir')) {
        $pelanggarans = PelanggaranPendamping::with('user')->whereBetween('tanggal', [request('tanggalAwal'), request('tanggalAkhir')])->latest()->get();
      } else {
        $pelanggarans = PelanggaranPendamping::with('user')->latest()->get();
      }
        return view('exports.rekapPelanggaranPendamping', [
          'pelanggarans' => $pelanggarans
        ]);
    }
}
