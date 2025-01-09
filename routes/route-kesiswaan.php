<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CekPresensi\CekPresensiList;
use App\Livewire\RaporSantri\RaporSantriList;
use App\Livewire\RaporSantri\RaporSantriDetail;
use App\Livewire\CatatanSantri\CatatanSantriEdit;
use App\Livewire\CatatanSantri\CatatanSantriList;
use App\Livewire\RekapPresensi\RekapPresensiList;
use App\Livewire\CatatanSantri\CatatanSantriCreate;
use App\Livewire\CatatanSantri\CatatanSantriDetail;
use App\Livewire\RekapPembinaan\RekapPembinaanList;
use App\Livewire\PembinaanSantri\PembinaanSantriEdit;
use App\Livewire\PembinaanSantri\PembinaanSantriList;
use App\Livewire\PenguranganPoin\PenguranganPoinEdit;
use App\Livewire\PenguranganPoin\PenguranganPoinList;
use App\Livewire\IzinKeluarSantri\IzinKeluarSantriEdit;
use App\Livewire\IzinKeluarSantri\IzinKeluarSantriList;
use App\Livewire\PembinaanSantri\PembinaanSantriCreate;
use App\Livewire\PembinaanSantri\PembinaanSantriDetail;
use App\Livewire\PenguranganPoin\PenguranganPoinCreate;
use App\Livewire\PenguranganPoin\PenguranganPoinDetail;
use App\Livewire\RekapPelanggaran\RekapPelanggaranList;
use App\Livewire\RekapPenghargaan\RekapPenghargaanList;
use App\Livewire\CekPresensi\CekPresensiSholatSantriList;
use App\Livewire\IzinKeluarSantri\IzinKeluarSantriCreate;
use App\Livewire\IzinKeluarSantri\IzinKeluarSantriDetail;
use App\Livewire\PelanggaranSantri\PelanggaranSantriEdit;
use App\Livewire\PelanggaranSantri\PelanggaranSantriList;
use App\Livewire\PenghargaanSantri\PenghargaanSantriEdit;
use App\Livewire\PenghargaanSantri\PenghargaanSantriList;
use App\Livewire\PelanggaranSantri\PelanggaranSantriCreate;
use App\Livewire\PelanggaranSantri\PelanggaranSantriDetail;
use App\Livewire\PenghargaanSantri\PenghargaanSantriCreate;
use App\Livewire\PenghargaanSantri\PenghargaanSantriDetail;
use App\Livewire\PresensiInsidentilSantri\PresensiInsidentilSantriList;
use App\Livewire\PresensiInsidentilSantri\PresensiInsidentilSantriCreate;
use App\Livewire\CekPresensiInsidentilSantri\CekPresensiInsidentilSantriList;



  // crud izin keluar santri by kesiswaan start
  Route::get('/{lembaga}/kesiswaan/izinKeluarSantri', IzinKeluarSantriList::class);
  Route::get('/{lembaga}/kesiswaan/izinKeluarSantri/create', IzinKeluarSantriCreate::class);
  Route::get('/{lembaga}/kesiswaan/izinKeluarSantri/{izinKeluarSantri}/edit', IzinKeluarSantriEdit::class);
  Route::get('/{lembaga}/kesiswaan/detailIzinKeluarSantri/{santri}', IzinKeluarSantriDetail::class);
  // crud izin keluar santri by kesiswaan end

  
  
  // crud pelanggaran santri start
  Route::get('/{lembaga}/kesiswaan/pelanggaranSantri', PelanggaranSantriList::class);
  Route::get('/{lembaga}/kesiswaan/pelanggaranSantri/create', PelanggaranSantriCreate::class);
  Route::get('/{lembaga}/kesiswaan/pelanggaranSantri/{pelanggaranSantri}/edit', PelanggaranSantriEdit::class);
  Route::get('/{lembaga}/kesiswaan/pelanggaranSantri/detail/{santri}', PelanggaranSantriDetail::class);
  // crud pelanggaran santri end

  
  // crud penghargaan santri start
  Route::get('/{lembaga}/kesiswaan/penghargaanSantri', PenghargaanSantriList::class);
  Route::get('/{lembaga}/kesiswaan/penghargaanSantri/create', PenghargaanSantriCreate::class);
  Route::get('/{lembaga}/kesiswaan/penghargaanSantri/{penghargaanSantri}/edit', PenghargaanSantriEdit::class);
  Route::get('/{lembaga}/kesiswaan/penghargaanSantri/detail/{santri}', PenghargaanSantriDetail::class);
  // crud penghargaan santri end

  
  
  // crud pengurangan poin start
  Route::get('/{lembaga}/kesiswaan/penguranganPoin', PenguranganPoinList::class);
  Route::get('/{lembaga}/kesiswaan/penguranganPoin/create', PenguranganPoinCreate::class);
  Route::get('/{lembaga}/kesiswaan/penguranganPoin/{penguranganPoin}/edit', PenguranganPoinEdit::class);
  Route::get('/{lembaga}/kesiswaan/penguranganPoin/detail/{santri}', PenguranganPoinDetail::class);
  // crud pengurangan poin end

  
  
   // catatan santri start
  Route::get('/{lembaga}/kesiswaan/catatanSantri', CatatanSantriList::class);
  Route::get('/{lembaga}/kesiswaan/catatanSantri/create', CatatanSantriCreate::class);
  Route::get('/{lembaga}/kesiswaan/catatanSantri/{catatanSantri}/edit', CatatanSantriEdit::class);
  Route::get('/{lembaga}/kesiswaan/catatanSantri/detail/{santri}', CatatanSantriDetail::class);
  // catatan santri end

  // crud pembinaan santri start
  Route::get('/{lembaga}/kesiswaan/pembinaanSantri', PembinaanSantriList::class);
  Route::get('/{lembaga}/kesiswaan/pembinaanSantri/create', PembinaanSantriCreate::class);
  Route::get('/{lembaga}/kesiswaan/pembinaanSantri/{pembinaanSantri}/edit', PembinaanSantriEdit::class);
  Route::get('/{lembaga}/kesiswaan/pembinaanSantri/detail/{santri}', PembinaanSantriDetail::class);
  // crud pembinaan santri end


  // crud presensi insidentil santri start
  Route::get('/{lembaga}/kesiswaan/presensiInsidentilSantri', PresensiInsidentilSantriList::class);
  Route::get('/{lembaga}/kesiswaan/presensiInsidentilSantri/create', PresensiInsidentilSantriCreate::class);
  Route::post('/{lembaga}/kesiswaan/presensiInsidentilSantri', [PresensiInsidentilSantriCreate::class, 'tambah']);
  // crud presensi insidentil santri end

  // rapor santri start
  Route::get('/raporSantri/{kelas}/kesiswaan', RaporSantriList::class);
  Route::get('/raporSantri/detail/{santri}/{kelas}/kesiswaan', RaporSantriDetail::class);
  // rapor santri end

  // cek presensi start
  Route::get('/{lembaga}/kesiswaan/cekPresensi', CekPresensiList::class);
  // cek presensi end

  // cek presensi sholat santri start
  Route::get('/{lembaga}/kesiswaan/cekPresensiSholatSantri', CekPresensiSholatSantriList::class);
  // cek preesnsi sholat santri end

  // cek presensi insidentil santri start
  Route::get('/{lembaga}/kesiswaan/cekPresensiInsidentilSantri', CekPresensiInsidentilSantriList::class);
  // cek presensi insidentil santri end

  // rekap presensi start
  Route::get('/{lembaga}/kesiswaan/rekapPresensi', RekapPresensiList::class);
  // rekap presensi end

  // rekapitulasi start
  Route::get('/kesiswaan/rekapPelanggaran', RekapPelanggaranList::class);
  Route::get('/kesiswaan/rekapPembinaan', RekapPembinaanList::class);
  Route::get('/kesiswaan/rekapPenghargaan', RekapPenghargaanList::class);
  // rekapitulasi end