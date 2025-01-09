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
use App\Livewire\PenguranganPoin\PenguranganPoinEdit;
use App\Livewire\PenguranganPoin\PenguranganPoinList;
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
use App\Livewire\PenguranganPoin\PenguranganPoinCreate;
use App\Livewire\PenguranganPoin\PenguranganPoinDetail;
use App\Livewire\IzinKeluarSantri\IzinKeluarSantriCreate;
use App\Livewire\IzinKeluarSantri\IzinKeluarSantriDetail;
use App\Livewire\IzinPulangSantri\IzinPulangSantriCreate;
use App\Livewire\IzinPulangSantri\IzinPulangSantriDetail;
use App\Livewire\PelanggaranSantri\PelanggaranSantriEdit;
use App\Livewire\PelanggaranSantri\PelanggaranSantriList;
use App\Livewire\PenghargaanSantri\PenghargaanSantriEdit;
use App\Livewire\PenghargaanSantri\PenghargaanSantriList;
use App\Livewire\PelanggaranSantri\PelanggaranSantriCreate;
use App\Livewire\PelanggaranSantri\PelanggaranSantriDetail;
use App\Livewire\PenghargaanSantri\PenghargaanSantriCreate;
use App\Livewire\PenghargaanSantri\PenghargaanSantriDetail;
use App\Livewire\IzinKeluarPendamping\IzinKeluarPendampingEdit;
use App\Livewire\IzinKeluarPendamping\IzinKeluarPendampingList;
use App\Livewire\IzinPulangPendamping\IzinPulangPendampingList;
use App\Livewire\IzinKeluarPendamping\IzinKeluarPendampingCreate;
use App\Livewire\IzinKeluarPendamping\IzinKeluarPendampingDetail;
use App\Livewire\IzinPulangPendamping\IzinPulangPendampingCreate;
use App\Livewire\IzinPulangPendamping\IzinPulangPendampingDetail;
use App\Livewire\PresensiInsidentilSantri\PresensiInsidentilSantriList;
use App\Livewire\PresensiInsidentilSantri\PresensiInsidentilSantriCreate;



  // crud izin keluar santri by pengurus start
  Route::get('/{lembaga}/pengurus/izinKeluarSantri', IzinKeluarSantriList::class);
  Route::get('/{lembaga}/pengurus/izinKeluarSantri/create', IzinKeluarSantriCreate::class);
  Route::get('/{lembaga}/pengurus/izinKeluarSantri/{izinKeluarSantri}/edit', IzinKeluarSantriEdit::class);
  Route::get('/{lembaga}/pengurus/detailIzinKeluarSantri/{santri}', IzinKeluarSantriDetail::class);
  // crud izin keluar santri by pengurus end

 
  // crud izin pulang santri by pengurus start
  Route::get('/{lembaga}/pengurus/izinPulangSantri', IzinPulangSantriList::class);
  Route::get('/{lembaga}/pengurus/izinPulangSantri/create', IzinPulangSantriCreate::class);
  Route::get('/{lembaga}/pengurus/izinPulangSantri/{izinPulangSantri}/edit', IzinPulangSantriEdit::class);
  Route::get('/{lembaga}/pengurus/detailIzinPulangSantri/{santri}', IzinPulangSantriDetail::class);
  // crud izin pulang santri by pengurus start

  
  // crud izin sakit santri by pengurus start
  Route::get('/{lembaga}/pengurus/izinSakitSantri', IzinSakitSantriList::class);
  Route::get('/{lembaga}/pengurus/izinSakitSantri/create', IzinSakitSantriCreate::class);
  Route::get('/{lembaga}/pengurus/izinSakitSantri/{izinSakitSantri}/edit', IzinSakitSantriEdit::class);
  Route::get('/{lembaga}/pengurus/detailIzinSakitSantri/{santri}', IzinSakitSantriDetail::class);
  // crud izin sakit santri by pengurus start

  
  // crud izin keluar pendamping start
  Route::get('/pengurus/izinKeluarPendamping', IzinKeluarPendampingList::class);
  Route::get('/pengurus/izinKeluarPendamping/create', IzinKeluarPendampingCreate::class);
  Route::get('/pengurus/izinKeluarPendamping/{izinKeluarPendamping}/edit', IzinKeluarPendampingEdit::class);
  Route::get('/pengurus/izinKeluarPendamping/detail/{user}', IzinKeluarPendampingDetail::class);
  // crud izin keluar pendamping end

  // crud izin pulang pendamping by pengurus start
  Route::get('/pengurus/izinPulangPendamping', IzinPulangPendampingList::class);
  Route::get('/pengurus/izinPulangPendamping/create', IzinPulangPendampingCreate::class);
  Route::get('/pengurus/izinPulangPendamping/detail/{user}', IzinPulangPendampingDetail::class);
  // crud izin pulang pendamping by pengurus end

  // crud haid santri start
    Route::get('/pengurus/haidSantri', HaidSantriList::class);
    Route::get('/pengurus/haidSantri/create', HaidSantriCreate::class);
    Route::get('/pengurus/haidSantri/{haidSantri}/edit', HaidSantriEdit::class);
  // crud haid santri end

  // crud presensi sholat start
   Route::get('/{lembaga}/pengurus/presensiSholat', PresensiSholatList::class);
   Route::get('/{lembaga}/pengurus/presensiSholat/create', PresensiSholatCreate::class);
   Route::post('/pengurus/presensiSholat', [PresensiSholatCreate::class, 'tambah']);
  //  crud presensi sholat end

  
  
  // crud pelanggaran santri start
  Route::get('/{lembaga}/pengurus/pelanggaranSantri', PelanggaranSantriList::class);
  Route::get('/{lembaga}/pengurus/pelanggaranSantri/create', PelanggaranSantriCreate::class);
  Route::get('/{lembaga}/pengurus/pelanggaranSantri/{pelanggaranSantri}/edit', PelanggaranSantriEdit::class);
  Route::get('/{lembaga}/pengurus/pelanggaranSantri/detail/{santri}', PelanggaranSantriDetail::class);
  // crud pelanggaran santri end

  
  // crud penghargaan santri start
  Route::get('/{lembaga}/pengurus/penghargaanSantri', PenghargaanSantriList::class);
  Route::get('/{lembaga}/pengurus/penghargaanSantri/create', PenghargaanSantriCreate::class);
  Route::get('/{lembaga}/pengurus/penghargaanSantri/{penghargaanSantri}/edit', PenghargaanSantriEdit::class);
  Route::get('/{lembaga}/pengurus/penghargaanSantri/detail/{santri}', PenghargaanSantriDetail::class);
  // crud penghargaan santri end

  
  
  // crud pengurangan poin start
  Route::get('/{lembaga}/pengurus/penguranganPoin', PenguranganPoinList::class);
  Route::get('/{lembaga}/pengurus/penguranganPoin/create', PenguranganPoinCreate::class);
  Route::get('/{lembaga}/pengurus/penguranganPoin/{penguranganPoin}/edit', PenguranganPoinEdit::class);
  Route::get('/{lembaga}/pengurus/penguranganPoin/detail/{santri}', PenguranganPoinDetail::class);
  // crud pengurangan poin end

  
  
   // catatan santri start
  Route::get('/{lembaga}/pengurus/catatanSantri', CatatanSantriList::class);
  Route::get('/{lembaga}/pengurus/catatanSantri/create', CatatanSantriCreate::class);
  Route::get('/{lembaga}/pengurus/catatanSantri/{catatanSantri}/edit', CatatanSantriEdit::class);
  Route::get('/{lembaga}/pengurus/catatanSantri/detail/{santri}', CatatanSantriDetail::class);
  // catatan santri end

  // crud pembinaan santri start
  Route::get('/{lembaga}/pengurus/pembinaanSantri', PembinaanSantriList::class);
  Route::get('/{lembaga}/pengurus/pembinaanSantri/create', PembinaanSantriCreate::class);
  Route::get('/{lembaga}/pengurus/pembinaanSantri/{pembinaanSantri}/edit', PembinaanSantriEdit::class);
  Route::get('/{lembaga}/pengurus/pembinaanSantri/detail/{santri}', PembinaanSantriDetail::class);
  // crud pembinaan santri end

  // crud presensi insidentil santri start
  Route::get('/{lembaga}/pengurus/presensiInsidentilSantri', PresensiInsidentilSantriList::class);
  Route::get('/{lembaga}/pengurus/presensiInsidentilSantri/create', PresensiInsidentilSantriCreate::class);
  Route::post('/{lembaga}/pengurus/presensiInsidentilSantri', [PresensiInsidentilSantriCreate::class, 'tambah']);
  // crud presensi insidentil santri end

  
  // Presensi asrama start
  Route::get('/{lembaga}/pendamping/presensiAsrama', PresensiAsramaList::class);
  Route::get('/{lembaga}/pendamping/presensiAsrama/create', PresensiAsramaCreate::class);
  Route::post('/pendamping/presensiAsrama', [PresensiAsramaCreate::class, 'tambah']);
  // Presensi asrama end