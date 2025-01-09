<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\IzinKeluarSantri\IzinKeluarSantriList;
use App\Livewire\IzinPulangSantri\IzinPulangSantriList;
use App\Livewire\IzinKeluarSantri\IzinKeluarSantriDetail;
use App\Livewire\IzinPulangSantri\IzinPulangSantriDetail;
use App\Livewire\IzinKeluarPendamping\IzinKeluarPendampingList;
use App\Livewire\IzinPulangPendamping\IzinPulangPendampingList;
use App\Livewire\IzinKeluarPendamping\IzinKeluarPendampingDetail;
use App\Livewire\IzinPulangPendamping\IzinPulangPendampingDetail;



  // crud izin keluar santri by keamanan start
  Route::get('/semua/keamanan/izinKeluarSantri', IzinKeluarSantriList::class);
  Route::get('/semua/keamanan/detailIzinKeluarSantri/{santri}', IzinKeluarSantriDetail::class);
  // crud izin keluar santri by keamanan end

  // crud izin pulang santri by keamanan start
  Route::get('/semua/keamanan/izinPulangSantri', IzinPulangSantriList::class);
  Route::get('/semua/keamanan/detailIzinPulangSantri/{santri}', IzinPulangSantriDetail::class);
  // crud izin pulang santri by keamanan start

  
  // crud izin keluar pendamping start
  Route::get('/keamanan/izinKeluarPendamping', IzinKeluarPendampingList::class);
  Route::get('/keamanan/izinKeluarPendamping/detail/{user}', IzinKeluarPendampingDetail::class);
  // crud izin keluar pendamping end

  
  // crud izin pulang pendamping by keamanan start
  Route::get('/keamanan/izinPulangPendamping', IzinPulangPendampingList::class);
  Route::get('/keamanan/izinPulangPendamping/detail/{user}', IzinPulangPendampingDetail::class);
  // crud izin pulang pendamping by keamanan end