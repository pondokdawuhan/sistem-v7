<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CekPresensi\CekPresensiList;
use App\Livewire\IzinAsatidz\IzinAsatidzList;
use App\Livewire\RaporSantri\RaporSantriList;
use App\Livewire\IzinAsatidz\IzinAsatidzDetail;
use App\Livewire\RaporLembaga\RaporLembagaList;
use App\Livewire\RaporSantri\RaporSantriDetail;
use App\Livewire\RaporLembaga\RaporLembagaDetail;
use App\Livewire\PembinaanSantri\PembinaanSantriEdit;
use App\Livewire\PembinaanSantri\PembinaanSantriList;
use App\Livewire\PembinaanSantri\PembinaanSantriCreate;
use App\Livewire\PembinaanSantri\PembinaanSantriDetail;
use App\Livewire\PresensiKegiatanAsatidz\PresensiKegiatanAsatidzList;
use App\Livewire\PresensiKegiatanAsatidz\PresensiKegiatanAsatidzCreate;
use App\Livewire\CekPresensiInsidentilSantri\CekPresensiInsidentilSantriList;


  // izin asatidz by kepala start
  Route::get('/{lembaga}/kepala/izinAsatidz', IzinAsatidzList::class);
  Route::get('/{lembaga}/kepala/izinAsatidz/detail/{user}', IzinAsatidzDetail::class);
  // izin asatidz by kepala end
  

  // crud pembinaan santri start
  Route::get('/{lembaga}/kepala/pembinaanSantri', PembinaanSantriList::class);
  Route::get('/{lembaga}/kepala/pembinaanSantri/create', PembinaanSantriCreate::class);
  Route::get('/{lembaga}/kepala/pembinaanSantri/{pembinaanSantri}/edit', PembinaanSantriEdit::class);
  Route::get('/{lembaga}/kepala/pembinaanSantri/detail/{santri}', PembinaanSantriDetail::class);
  // crud pembinaan santri end

  // presensi kegiatan asatidz start
  Route::get('/{lembaga}/kepala/presensiKegiatanAsatidz', PresensiKegiatanAsatidzList::class);
  Route::get('/{lembaga}/kepala/presensiKegiatanAsatidz/create', PresensiKegiatanAsatidzCreate::class);
  Route::post('/{lembaga}/kepala/presensiKegiatanAsatidz', [PresensiKegiatanAsatidzCreate::class, 'tambah']);
  // presensi kegiatan asatidz end

  // cek presensi start
  Route::get('/{lembaga}/kepala/cekPresensi', CekPresensiList::class);
  // cek presensi end
  
  // cek presensi insidentil santri start
  Route::get('/{lembaga}/kepala/cekPresensiInsidentilSantri', CekPresensiInsidentilSantriList::class);
  // cek presensi insidentil santri end

  Route::get('/raporSantri/{kelas}/kepala', RaporSantriList::class);
  Route::get('/raporSantri/detail/{santri}/{kelas}/kepala', RaporSantriDetail::class);

  Route::get('/{lembaga}/kepala/raporLembaga', RaporLembagaList::class);
  Route::get('/{lembaga}/kepala/raporLembaga/detail/{user}', RaporLembagaDetail::class);






