<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\PembinaanSantri\PembinaanSantriEdit;
use App\Livewire\PembinaanSantri\PembinaanSantriList;
use App\Livewire\RaporPendamping\RaporPendampingList;
use App\Livewire\IzinKeluarSantri\IzinKeluarSantriEdit;
use App\Livewire\IzinKeluarSantri\IzinKeluarSantriList;
use App\Livewire\IzinPulangSantri\IzinPulangSantriEdit;
use App\Livewire\IzinPulangSantri\IzinPulangSantriList;
use App\Livewire\PembinaanSantri\PembinaanSantriCreate;
use App\Livewire\PembinaanSantri\PembinaanSantriDetail;
use App\Livewire\RaporPendamping\RaporPendampingDetail;
use App\Livewire\CekPresensi\CekPresensiSholatSantriList;
use App\Livewire\CekPresensiAsrama\CekPresensiAsramaList;
use App\Livewire\IzinKeluarSantri\IzinKeluarSantriCreate;
use App\Livewire\IzinKeluarSantri\IzinKeluarSantriDetail;
use App\Livewire\IzinPulangSantri\IzinPulangSantriCreate;
use App\Livewire\IzinPulangSantri\IzinPulangSantriDetail;
use App\Livewire\IzinKeluarPendamping\IzinKeluarPendampingList;
use App\Livewire\IzinPulangPendamping\IzinPulangPendampingList;
use App\Livewire\IzinKeluarPendamping\IzinKeluarPendampingDetail;
use App\Livewire\IzinPulangPendamping\IzinPulangPendampingDetail;
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
  Route::get('/{lembaga}/presensiSholatPendamping', PresensiSholatPendampingList::class);
  Route::get('/{lembaga}/presensiSholatPendamping/create', PresensiSholatPendampingCreate::class);
  Route::post('/{lembaga}/presensiSholatPendamping', [PresensiSholatPendampingCreate::class, 'tambah']);
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

  // crud izin keluar santri by ketuaasrama start
  Route::get('/{lembaga}/ketuaasrama/izinKeluarSantri', IzinKeluarSantriList::class);
  Route::get('/{lembaga}/ketuaasrama/izinKeluarSantri/create', IzinKeluarSantriCreate::class);
  Route::get('/{lembaga}/ketuaasrama/izinKeluarSantri/{izinKeluarSantri}/edit', IzinKeluarSantriEdit::class);
  Route::get('/{lembaga}/ketuaasrama/detailIzinKeluarSantri/{santri}', IzinKeluarSantriDetail::class);
  // crud izin keluar santri by ketuaasrama end

  // crud izin pulang santri by ketuaasrama start
  Route::get('/{lembaga}/ketuaasrama/izinPulangSantri', IzinPulangSantriList::class);
  Route::get('/{lembaga}/ketuaasrama/izinPulangSantri/create', IzinPulangSantriCreate::class);
  Route::get('/{lembaga}/ketuaasrama/izinPulangSantri/{izinPulangSantri}/edit', IzinPulangSantriEdit::class);
  Route::get('/{lembaga}/ketuaasrama/detailIzinPulangSantri/{santri}', IzinPulangSantriDetail::class);
  // crud izin pulang santri by ketuaasrama end

  
  // crud izin keluar pendamping start
  Route::get('/ketuaasrama/izinKeluarPendamping', IzinKeluarPendampingList::class);
  Route::get('/ketuaasrama/izinKeluarPendamping/detail/{user}', IzinKeluarPendampingDetail::class);
  // crud izin keluar pendamping end

  
  // crud izin pulang pendamping by ketuaasrama start
  Route::get('/ketuaasrama/izinPulangPendamping', IzinPulangPendampingList::class);
  Route::get('/ketuaasrama/izinPulangPendamping/detail/{user}', IzinPulangPendampingDetail::class);
  // crud izin pulang pendamping by ketuaasrama end