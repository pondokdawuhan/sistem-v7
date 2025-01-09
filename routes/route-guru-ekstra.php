<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\PembinaanSantri\PembinaanSantriEdit;
use App\Livewire\PembinaanSantri\PembinaanSantriList;
use App\Livewire\PembinaanSantri\PembinaanSantriCreate;
use App\Livewire\PembinaanSantri\PembinaanSantriDetail;
use App\Livewire\PresensiEkstrakurikuler\PresensiEkstrakurikulerList;
use App\Livewire\PresensiEkstrakurikuler\PresensiEkstrakurikulerCreate;


 //  crud presensi ekstra start
      Route::get('/{ekstrakurikuler}/presensiEkstrakurikuler', PresensiEkstrakurikulerList::class);
      Route::get('/{ekstrakurikuler}/presensiEkstrakurikuler/create', PresensiEkstrakurikulerCreate::class);
      Route::post('/{ekstrakurikuler}/presensiEkstrakurikuler', [PresensiEkstrakurikulerCreate::class, 'tambah']);
      //  crud presensi ekstra end

      

  // crud pembinaan santri start
  Route::get('/{lembaga}/guruEkstra/pembinaanSantri', PembinaanSantriList::class);
  Route::get('/{lembaga}/guruEkstra/pembinaanSantri/create', PembinaanSantriCreate::class);
  Route::get('/{lembaga}/guruEkstra/pembinaanSantri/{pembinaanSantri}/edit', PembinaanSantriEdit::class);
  Route::get('/{lembaga}/guruEkstra/pembinaanSantri/detail/{santri}', PembinaanSantriDetail::class);
  // crud pembinaan santri end


