<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HaidSantri\HaidSantriEdit;
use App\Livewire\HaidSantri\HaidSantriList;
use App\Livewire\HaidSantri\HaidSantriCreate;
use App\Livewire\CatatanSantri\CatatanSantriEdit;
use App\Livewire\CatatanSantri\CatatanSantriList;
use App\Livewire\CatatanSantri\CatatanSantriCreate;
use App\Livewire\CatatanSantri\CatatanSantriDetail;
use App\Livewire\PresensiSholat\PresensiSholatList;
use App\Livewire\PembinaanSantri\PembinaanSantriEdit;
use App\Livewire\PembinaanSantri\PembinaanSantriList;
use App\Livewire\PresensiSholat\PresensiSholatCreate;
use App\Livewire\PembinaanSantri\PembinaanSantriCreate;
use App\Livewire\PembinaanSantri\PembinaanSantriDetail;
use App\Livewire\PresensiInsidentilSantri\PresensiInsidentilSantriList;
use App\Livewire\PresensiInsidentilSantri\PresensiInsidentilSantriCreate;


  // crud haid santri start
    Route::get('/ketertiban/haidSantri', HaidSantriList::class);
    Route::get('/ketertiban/haidSantri/create', HaidSantriCreate::class);
    Route::get('/ketertiban/haidSantri/{haidSantri}/edit', HaidSantriEdit::class);
  // crud haid santri end

  // crud presensi sholat start
   Route::get('/{lembaga}/ketertiban/presensiSholat', PresensiSholatList::class);
   Route::get('/{lembaga}/ketertiban/presensiSholat/create', PresensiSholatCreate::class);
   Route::post('/ketertiban/presensiSholat', [PresensiSholatCreate::class, 'tambah']);
  //  crud presensi sholat end

   // catatan santri start
  Route::get('/{lembaga}/ketertiban/catatanSantri', CatatanSantriList::class);
  Route::get('/{lembaga}/ketertiban/catatanSantri/create', CatatanSantriCreate::class);
  Route::get('/{lembaga}/ketertiban/catatanSantri/{catatanSantri}/edit', CatatanSantriEdit::class);
  Route::get('/{lembaga}/ketertiban/catatanSantri/detail/{santri}', CatatanSantriDetail::class);
  // catatan santri end

  // crud pembinaan santri start
  Route::get('/{lembaga}/ketertiban/pembinaanSantri', PembinaanSantriList::class);
  Route::get('/{lembaga}/ketertiban/pembinaanSantri/create', PembinaanSantriCreate::class);
  Route::get('/{lembaga}/ketertiban/pembinaanSantri/{pembinaanSantri}/edit', PembinaanSantriEdit::class);
  Route::get('/{lembaga}/ketertiban/pembinaanSantri/detail/{santri}', PembinaanSantriDetail::class);
  // crud pembinaan santri end

  
  // crud presensi insidentil santri start
  Route::get('/{lembaga}/ketertiban/presensiInsidentilSantri', PresensiInsidentilSantriList::class);
  Route::get('/{lembaga}/ketertiban/presensiInsidentilSantri/create', PresensiInsidentilSantriCreate::class);
  Route::post('/{lembaga}/ketertiban/presensiInsidentilSantri', [PresensiInsidentilSantriCreate::class, 'tambah']);
  // crud presensi insidentil santri end

