<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HaidSantri\HaidSantriEdit;
use App\Livewire\HaidSantri\HaidSantriList;
use App\Livewire\HaidSantri\HaidSantriCreate;
use App\Livewire\CatatanSantri\CatatanSantriEdit;
use App\Livewire\CatatanSantri\CatatanSantriList;
use App\Livewire\CatatanSantri\CatatanSantriCreate;
use App\Livewire\CatatanSantri\CatatanSantriDetail;
use App\Livewire\PresensiAsrama\PresensiAsramaList;
use App\Livewire\PresensiSholat\PresensiSholatList;
use App\Livewire\IzinSakitSantri\IzinSakitSantriEdit;
use App\Livewire\IzinSakitSantri\IzinSakitSantriList;
use App\Livewire\PembinaanSantri\PembinaanSantriEdit;
use App\Livewire\PembinaanSantri\PembinaanSantriList;
use App\Livewire\PresensiAsrama\PresensiAsramaCreate;
use App\Livewire\PresensiSholat\PresensiSholatCreate;
use App\Livewire\IzinKeluarSantri\IzinKeluarSantriEdit;
use App\Livewire\IzinKeluarSantri\IzinKeluarSantriList;
use App\Livewire\IzinPulangSantri\IzinPulangSantriEdit;
use App\Livewire\IzinPulangSantri\IzinPulangSantriList;
use App\Livewire\IzinSakitSantri\IzinSakitSantriCreate;
use App\Livewire\IzinSakitSantri\IzinSakitSantriDetail;
use App\Livewire\PembinaanSantri\PembinaanSantriCreate;
use App\Livewire\PembinaanSantri\PembinaanSantriDetail;
use App\Livewire\IzinKeluarSantri\IzinKeluarSantriCreate;
use App\Livewire\IzinKeluarSantri\IzinKeluarSantriDetail;
use App\Livewire\IzinPulangSantri\IzinPulangSantriCreate;
use App\Livewire\IzinPulangSantri\IzinPulangSantriDetail;
use App\Livewire\IzinKeluarPendamping\IzinKeluarPendampingEdit;
use App\Livewire\IzinKeluarPendamping\IzinKeluarPendampingList;
use App\Livewire\IzinPulangPendamping\IzinPulangPendampingList;
use App\Livewire\IzinKeluarPendamping\IzinKeluarPendampingCreate;
use App\Livewire\IzinKeluarPendamping\IzinKeluarPendampingDetail;
use App\Livewire\IzinPulangPendamping\IzinPulangPendampingCreate;
use App\Livewire\IzinPulangPendamping\IzinPulangPendampingDetail;
use App\Livewire\PresensiInsidentilSantri\PresensiInsidentilSantriList;
use App\Livewire\PresensiInsidentilSantri\PresensiInsidentilSantriCreate;


  // crud izin keluar santri by pendamping start
  Route::get('/{lembaga}/pendamping/izinKeluarSantri', IzinKeluarSantriList::class);
  Route::get('/{lembaga}/pendamping/izinKeluarSantri/create', IzinKeluarSantriCreate::class);
  Route::get('/{lembaga}/pendamping/izinKeluarSantri/{izinKeluarSantri}/edit', IzinKeluarSantriEdit::class);
  Route::get('/{lembaga}/pendamping/detailIzinKeluarSantri/{santri}', IzinKeluarSantriDetail::class);
  // crud izin keluar santri by pendamping end

  
  // crud izin pulang santri by pendamping start
  Route::get('/{lembaga}/pendamping/izinPulangSantri', IzinPulangSantriList::class);
  Route::get('/{lembaga}/pendamping/izinPulangSantri/create', IzinPulangSantriCreate::class);
  Route::get('/{lembaga}/pendamping/izinPulangSantri/{izinPulangSantri}/edit', IzinPulangSantriEdit::class);
  Route::get('/{lembaga}/pendamping/detailIzinPulangSantri/{santri}', IzinPulangSantriDetail::class);
  // crud izin pulang santri by pendamping start

  
  // crud izin sakit santri by pendamping start
  Route::get('/{lembaga}/pendamping/izinSakitSantri', IzinSakitSantriList::class);
  Route::get('/{lembaga}/pendamping/izinSakitSantri/create', IzinSakitSantriCreate::class);
  Route::get('/{lembaga}/pendamping/izinSakitSantri/{izinSakitSantri}/edit', IzinSakitSantriEdit::class);
  Route::get('/{lembaga}/pendamping/detailIzinSakitSantri/{santri}', IzinSakitSantriDetail::class);
  // crud izin sakit santri by pendamping start

  // crud izin keluar pendamping start
  Route::get('/pendamping/izinKeluarPendamping', IzinKeluarPendampingList::class);
  Route::get('/pendamping/izinKeluarPendamping/create', IzinKeluarPendampingCreate::class);
  Route::get('/pendamping/izinKeluarPendamping/{izinKeluarPendamping}/edit', IzinKeluarPendampingEdit::class);
  Route::get('/pendamping/izinKeluarPendamping/detail/{user}', IzinKeluarPendampingDetail::class);
  // crud izin keluar pendamping end

  // crud izin pulang pendamping by pendamping start
  Route::get('/pendamping/izinPulangPendamping', IzinPulangPendampingList::class);
  Route::get('/pendamping/izinPulangPendamping/create', IzinPulangPendampingCreate::class);
  Route::get('/pendamping/izinPulangPendamping/detail/{user}', IzinPulangPendampingDetail::class);
  // crud izin pulang pendamping by pendamping end

  // crud haid santri start
    Route::get('/pendamping/haidSantri', HaidSantriList::class);
    Route::get('/pendamping/haidSantri/create', HaidSantriCreate::class);
    Route::get('/pendamping/haidSantri/{haidSantri}/edit', HaidSantriEdit::class);
  // crud haid santri end

  // crud presensi sholat start
   Route::get('/{lembaga}/pendamping/presensiSholat', PresensiSholatList::class);
   Route::get('/{lembaga}/pendamping/presensiSholat/create', PresensiSholatCreate::class);
   Route::post('/pendamping/presensiSholat', [PresensiSholatCreate::class, 'tambah']);
  //  crud presensi sholat end

  

   // catatan santri start
  Route::get('/{lembaga}/pendamping/catatanSantri', CatatanSantriList::class);
  Route::get('/{lembaga}/pendamping/catatanSantri/create', CatatanSantriCreate::class);
  Route::get('/{lembaga}/pendamping/catatanSantri/{catatanSantri}/edit', CatatanSantriEdit::class);
  Route::get('/{lembaga}/pendamping/catatanSantri/detail/{santri}', CatatanSantriDetail::class);
  // catatan santri end

  // crud pembinaan santri start
  Route::get('/{lembaga}/pendamping/pembinaanSantri', PembinaanSantriList::class);
  Route::get('/{lembaga}/pendamping/pembinaanSantri/create', PembinaanSantriCreate::class);
  Route::get('/{lembaga}/pendamping/pembinaanSantri/{pembinaanSantri}/edit', PembinaanSantriEdit::class);
  Route::get('/{lembaga}/pendamping/pembinaanSantri/detail/{santri}', PembinaanSantriDetail::class);
  // crud pembinaan santri end
  
  // crud presensi insidentil santri start
  Route::get('/{lembaga}/pendamping/presensiInsidentilSantri', PresensiInsidentilSantriList::class);
  Route::get('/{lembaga}/pendamping/presensiInsidentilSantri/create', PresensiInsidentilSantriCreate::class);
  Route::post('/{lembaga}/pendamping/presensiInsidentilSantri', [PresensiInsidentilSantriCreate::class, 'tambah']);
  // crud presensi insidentil santri end

  
  // Presensi asrama start
  Route::get('/{lembaga}/pendamping/presensiAsrama', PresensiAsramaList::class);
  Route::get('/{lembaga}/pendamping/presensiAsrama/create', PresensiAsramaCreate::class);
  Route::post('/pendamping/presensiAsrama', [PresensiAsramaCreate::class, 'tambah']);
  // Presensi asrama end