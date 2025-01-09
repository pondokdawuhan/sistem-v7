<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\RaporSantri\RaporSantriList;
use App\Livewire\RaporSantri\RaporSantriDetail;
use App\Livewire\HafalanSantri\HafalanSantriEdit;
use App\Livewire\HafalanSantri\HafalanSantriList;
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

  // crud presensi insidentil santri start
  Route::get('/{lembaga}/walikelas/presensiInsidentilSantri', PresensiInsidentilSantriList::class);
  Route::get('/{lembaga}/walikelas/presensiInsidentilSantri/create', PresensiInsidentilSantriCreate::class);
  Route::post('/{lembaga}/walikelas/presensiInsidentilSantri', [PresensiInsidentilSantriCreate::class, 'tambah']);
  // crud presensi insidentil santri end

  

  // crud pembinaan santri start
  Route::get('/{lembaga}/walikelas/pembinaanSantri', PembinaanSantriList::class);
  Route::get('/{lembaga}/walikelas/pembinaanSantri/create', PembinaanSantriCreate::class);
  Route::get('/{lembaga}/walikelas/pembinaanSantri/{pembinaanSantri}/edit', PembinaanSantriEdit::class);
  Route::get('/{lembaga}/walikelas/pembinaanSantri/detail/{santri}', PembinaanSantriDetail::class);
  // crud pembinaan santri end

  
  Route::get('/raporSantri/{kelas}/walikelas', RaporSantriList::class);
  Route::get('/raporSantri/detail/{santri}/{kelas}/walikelas', RaporSantriDetail::class);


