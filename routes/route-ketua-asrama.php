<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\PembinaanSantri\PembinaanSantriEdit;
use App\Livewire\PembinaanSantri\PembinaanSantriList;
use App\Livewire\RaporPendamping\RaporPendampingList;
use App\Livewire\PembinaanSantri\PembinaanSantriCreate;
use App\Livewire\PembinaanSantri\PembinaanSantriDetail;
use App\Livewire\RaporPendamping\RaporPendampingDetail;
use App\Livewire\CekPresensi\CekPresensiSholatSantriList;
use App\Livewire\CekPresensiAsrama\CekPresensiAsramaList;
use App\Livewire\PresensiKegiatanAsatidz\PresensiKegiatanAsatidzList;
use App\Livewire\PresensiKegiatanAsatidz\PresensiKegiatanAsatidzCreate;
use App\Livewire\PresensiSholatPendamping\PresensiSholatPendampingList;
use App\Livewire\PresensiSholatPendamping\PresensiSholatPendampingCreate;
use App\Livewire\CekPresensiInsidentilSantri\CekPresensiInsidentilSantriList;
use App\Livewire\PerbaikanPresensiInsidentilSantri\PerbaikanPresensiInsidentilSantriList;

  // cek presensi sholat santri start
  Route::get('/{lembaga}/ketuaasrama/cekPresensiSholatSantri', CekPresensiSholatSantriList::class);
  Route::get('/{lembaga}/ketuaasrama/cekPresensiInsidentilSantri', CekPresensiInsidentilSantriList::class);
  Route::get('/{lembaga}/ketuaasrama/perbaikanPresensiInsidentilSantri', PerbaikanPresensiInsidentilSantriList::class);
  // cek presensi sholat santri end

   // crud pembinaan santri start
  Route::get('/{lembaga}/ketuaAsrama/pembinaanSantri', PembinaanSantriList::class);
  Route::get('/{lembaga}/ketuaAsrama/pembinaanSantri/create', PembinaanSantriCreate::class);
  Route::get('/{lembaga}/ketuaAsrama/pembinaanSantri/{pembinaanSantri}/edit', PembinaanSantriEdit::class);
  Route::get('/{lembaga}/ketuaAsrama/pembinaanSantri/detail/{santri}', PembinaanSantriDetail::class);
  // crud pembinaan santri end

  // presensi sholat pendamping start
  Route::get('/presensiSholatPendamping', PresensiSholatPendampingList::class);
  Route::get('/presensiSholatPendamping/create', PresensiSholatPendampingCreate::class);
  Route::post('/presensiSholatPendamping', [PresensiSholatPendampingCreate::class, 'tambah']);
  // presensi sholat pendamping end

  
  // presensi kegiatan asatidz start
  Route::get('/{lembaga}/ketuaasrama/presensiKegiatanAsatidz', PresensiKegiatanAsatidzList::class);
  Route::get('/{lembaga}/ketuaasrama/presensiKegiatanAsatidz/create', PresensiKegiatanAsatidzCreate::class);
  Route::post('/{lembaga}/ketuaasrama/presensiKegiatanAsatidz', [PresensiKegiatanAsatidzCreate::class, 'tambah']);
  // presensi kegiatan asatidz end

  
  // cek presensi asrama start
  Route::get('/{lembaga}/ketuaasrama/cekPresensiAsrama', CekPresensiAsramaList::class);
  // cek presensi asrama end

  
  // Rapor Pendamping start
  Route::get('/{lembaga}/ketuaasrama/raporPendamping', RaporPendampingList::class);
  Route::get('/{lembaga}/ketuaasrama/raporPendamping/detail/{user}', RaporPendampingDetail::class);
  // Rapor Pendamping End