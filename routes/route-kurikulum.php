<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CekPresensi\CekPresensiList;
use App\Livewire\IzinAsatidz\IzinAsatidzList;
use App\Livewire\IzinAsatidz\IzinAsatidzDetail;
use App\Livewire\JadwalPelajaran\JadwalPelajaranList;
use App\Livewire\PembinaanSantri\PembinaanSantriEdit;
use App\Livewire\PembinaanSantri\PembinaanSantriList;
use App\Livewire\PembinaanSantri\PembinaanSantriCreate;
use App\Livewire\PembinaanSantri\PembinaanSantriDetail;

// jadwal pelajaran start
  
  Route::get('/{lembaga}/kurikulum/jadwalPelajaran', JadwalPelajaranList::class);
  Route::post('/{lembaga}/kurikulum/jadwalPelajaran', [JadwalPelajaranList::class, 'simpan']);
  // jadwal pelajaran end

  // izin asatidz by kurikulum start
  Route::get('/{lembaga}/kurikulum/izinAsatidz', IzinAsatidzList::class);
  Route::get('/{lembaga}/kurikulum/izinAsatidz/detail/{user}', IzinAsatidzDetail::class);
  // izin asatidz by kurikulum end
  

  // crud pembinaan santri start
  Route::get('/{lembaga}/kurikulum/pembinaanSantri', PembinaanSantriList::class);
  Route::get('/{lembaga}/kurikulum/pembinaanSantri/create', PembinaanSantriCreate::class);
  Route::get('/{lembaga}/kurikulum/pembinaanSantri/{pembinaanSantri}/edit', PembinaanSantriEdit::class);
  Route::get('/{lembaga}/kurikulum/pembinaanSantri/detail/{santri}', PembinaanSantriDetail::class);
  // crud pembinaan santri end

  // cek presensi start
  Route::get('/{lembaga}/kurikulum/cekPresensi', CekPresensiList::class);
  // cek presensi end


