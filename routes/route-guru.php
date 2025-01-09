<?php

use App\Livewire\Jurnal\JurnalList;
use Illuminate\Support\Facades\Route;
use App\Livewire\Presensi\PresensiCreate;
use App\Livewire\IzinAsatidz\IzinAsatidzEdit;
use App\Livewire\IzinAsatidz\IzinAsatidzList;
use App\Livewire\NilaiSantri\NilaiSantriList;
use App\Livewire\IzinAsatidz\IzinAsatidzCreate;
use App\Livewire\IzinAsatidz\IzinAsatidzDetail;
use App\Livewire\NilaiSantri\NilaiSantriCreate;
use App\Livewire\CatatanSantri\CatatanSantriEdit;
use App\Livewire\CatatanSantri\CatatanSantriList;
use App\Livewire\HafalanSantri\HafalanSantriEdit;
use App\Livewire\HafalanSantri\HafalanSantriList;
use App\Livewire\CatatanSantri\CatatanSantriCreate;
use App\Livewire\CatatanSantri\CatatanSantriDetail;
use App\Livewire\HafalanSantri\HafalanSantriCreate;
use App\Livewire\HafalanSantri\HafalanSantriDetail;
use App\Livewire\PembinaanSantri\PembinaanSantriEdit;
use App\Livewire\PembinaanSantri\PembinaanSantriList;
use App\Livewire\PembinaanSantri\PembinaanSantriCreate;
use App\Livewire\PembinaanSantri\PembinaanSantriDetail;
use App\Livewire\PresensiInsidentilSantri\PresensiInsidentilSantriList;
use App\Livewire\PresensiInsidentilSantri\PresensiInsidentilSantriCreate;

  
  // crud hafalan santri start
  Route::get('/{lembaga}/hafalanSantri', HafalanSantriList::class);
  Route::get('/{lembaga}/hafalanSantri/create', HafalanSantriCreate::class);
  Route::post('/{lembaga}/hafalanSantri', [HafalanSantriCreate::class, 'tambah']);
  Route::get('/{lembaga}/hafalanSantri/{hafalanSantri}/edit', HafalanSantriEdit::class);
  Route::get('/{lembaga}/hafalanSantri/detail/{santri}', HafalanSantriDetail::class);
  // crud hafalan santri end

  // crud presensi by guru start
  Route::get('/jurnal', JurnalList::class);
  Route::get('/{lembaga}/guru/presensi/create', PresensiCreate::class);
  Route::post('/guru/presensi/store', [PresensiCreate::class, 'tambah']);
  // crud presensi by guru end


  
  // izin asatidz by guru start
  Route::get('/{lembaga}/guru/izinAsatidz', IzinAsatidzList::class);
  Route::get('/{lembaga}/guru/izinAsatidz/create', IzinAsatidzCreate::class);
  Route::get('/{lembaga}/guru/izinAsatidz/{izinAsatidz}/edit', IzinAsatidzEdit::class);
  Route::get('/{lembaga}/guru/izinAsatidz/detail/{user}', IzinAsatidzDetail::class);
  // izin asatidz by guru end


  
  // crud nilai santri start
  Route::get('/{lembaga}/nilaiSantri', NilaiSantriList::class);
  Route::get('/{lembaga}/nilaiSantri/create', NilaiSantriCreate::class);
  Route::post('/{lembaga}/nilaiSantri', [NilaiSantriCreate::class, 'tambah']);
  // crud nilai santri end

  
   // catatan santri start
  Route::get('/{lembaga}/guru/catatanSantri', CatatanSantriList::class);
  Route::get('/{lembaga}/guru/catatanSantri/create', CatatanSantriCreate::class);
  Route::get('/{lembaga}/guru/catatanSantri/{catatanSantri}/edit', CatatanSantriEdit::class);
  Route::get('/{lembaga}/guru/catatanSantri/detail/{santri}', CatatanSantriDetail::class);
  // catatan santri end

  // crud pembinaan santri start
  Route::get('/{lembaga}/guru/pembinaanSantri', PembinaanSantriList::class);
  Route::get('/{lembaga}/guru/pembinaanSantri/create', PembinaanSantriCreate::class);
  Route::get('/{lembaga}/guru/pembinaanSantri/{pembinaanSantri}/edit', PembinaanSantriEdit::class);
  Route::get('/{lembaga}/guru/pembinaanSantri/detail/{santri}', PembinaanSantriDetail::class);
  // crud pembinaan santri end

  
  // crud presensi insidentil santri start
  Route::get('/{lembaga}/guru/presensiInsidentilSantri', PresensiInsidentilSantriList::class);
  Route::get('/{lembaga}/guru/presensiInsidentilSantri/create', PresensiInsidentilSantriCreate::class);
  Route::post('/{lembaga}/guru/presensiInsidentilSantri', [PresensiInsidentilSantriCreate::class, 'tambah']);
  // crud presensi insidentil santri end

