<?php

use App\Livewire\Jurnal\JurnalList;
use Illuminate\Support\Facades\Route;
use App\Livewire\Presensi\PresensiCreate;
use App\Livewire\IzinAsatidz\IzinAsatidzList;
use App\Livewire\IzinAsatidz\IzinAsatidzDetail;



  // crud presensi by guruPiket start
  Route::get('/{lembaga}/guruPiket/presensi/create', PresensiCreate::class);
  Route::post('/guruPiket/presensi/store', [PresensiCreate::class, 'tambah']);
  // crud presensi by guruPiket end

  // izin asatidz by guruPiket start
  Route::get('/{lembaga}/guruPiket/izinAsatidz', IzinAsatidzList::class);
  Route::get('/{lembaga}/guruPiket/izinAsatidz/detail/{user}', IzinAsatidzDetail::class);
  // izin asatidz by guruPiket end