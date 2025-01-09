<?php

namespace App\Exports;


use App\Models\User;
use App\Models\Santri;
use App\Models\NilaiSantri;
use App\Models\PresensiSholat;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekapNilaiSantri implements FromView
{
    public function view(): View
    {
      if (request('kelas') && request('pelajaran') && request('semester') && request('tahun')) {
          
          $santris = Santri::getSantriByKelas(request('lembaga'),request('kelas'));
          $nilais = NilaiSantri::with('pelajaran', 'user', 'santri')->where('user_id', auth()->user()->id)->getNilaiByKelasPelajaran($santris, request('pelajaran'), request('semester'), request('tahun'))->get();
          
        } else {
          $nilais = null;
          $santris = null;
        }

        return view('exports.rekapNilaiSantri', [
          'title' => 'Daftar Nilai Santri ' . request('lembaga'),
          'nilais' => $nilais,
          'santris' => $santris,
          'kelas' => User::getKelasMengajarUser(auth()->user(), request('lembaga')),
          'pelajarans' => User::getPelajaranUser(auth()->user(), request('lembaga')),
          'kelasName' => request('kelas') ?? null,
          'pelajaranName' => request('pelajaran') ?? null
        ]);
    }
}
