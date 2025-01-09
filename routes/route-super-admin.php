<?php

use App\Livewire\User\UserEdit;
use App\Livewire\User\UserList;
use App\Livewire\User\UserShow;
use App\Livewire\Kelas\KelasList;
use App\Livewire\Lembaga\Lembaga;
use App\Livewire\User\UserCreate;
use App\Livewire\Kelas\KelasRombel;
use App\Livewire\Santri\SantriEdit;
use App\Livewire\Santri\SantriList;
use App\Livewire\Santri\SantriShow;
use App\Livewire\Lembaga\LembagaEdit;
use App\Livewire\Santri\SantriCreate;
use Illuminate\Support\Facades\Route;
use App\Livewire\Lembaga\LembagaCreate;
use App\Http\Controllers\UserController;
use App\Livewire\BatasPoin\BatasPoinEdit;
use App\Livewire\BatasPoin\BatasPoinList;
use App\Livewire\Pelajaran\PelajaranList;
use App\Http\Controllers\SantriController;
use App\Livewire\BatasPoin\BatasPoinCreate;
use App\Livewire\RaporSantri\RaporSantriList;
use App\Livewire\TahunAjaran\TahunAjaranList;
use App\Livewire\RaporLembaga\RaporLembagaList;
use App\Livewire\RaporSantri\RaporSantriDetail;
use App\Livewire\RaporLembaga\RaporLembagaDetail;
use App\Livewire\ReferensiPoin\ReferensiPoinList;
use App\Livewire\RekapPresensi\RekapPresensiList;
use App\Livewire\RekapPembinaan\RekapPembinaanList;
use App\Livewire\Ekstrakurikuler\EkstrakurikulerList;
use App\Livewire\JadwalPelajaran\JadwalPelajaranList;
use App\Livewire\PerbaikanPresensi\PerbaikanPresensi;
use App\Livewire\RaporPendamping\RaporPendampingList;
use App\Livewire\Ekstrakurikuler\EkstrakurikulerRombel;
use App\Livewire\RaporPendamping\RaporPendampingDetail;
use App\Livewire\RekapPelanggaran\RekapPelanggaranList;
use App\Livewire\RekapPenghargaan\RekapPenghargaanList;
use App\Livewire\PerbaikanPresensi\PerbaikanPresensiAsrama;
use App\Livewire\PerbaikanPresensi\PerbaikanPresensiSholat;
use App\Livewire\PerbaikanPresensi\PerbaikanPresensiEkstrakurikuler;
use App\Livewire\PerbaikanPresensi\PerbaikanPresensiKegiatanAsatidz;
use App\Livewire\PerbaikanPresensi\PerbaikanPresensiSholatPendamping;
use App\Livewire\PerbaikanPresensiInsidentilSantri\PerbaikanPresensiInsidentilSantriList;


 // crud lembaga start
  Route::get('/lembaga', Lembaga::class);
  Route::get('/lembaga/create', LembagaCreate::class);
  Route::get('/lembaga/{lembaga}/edit', LembagaEdit::class);
  // crud lembaga end


  // crud kelas start
  Route::get('/kelas/{lembaga}', KelasList::class);
  Route::get('/editRombel/{lembaga}/{kelas}', KelasRombel::class);
  // crud kelas end
  

  // crud user start
  Route::get('/user', UserList::class);
  Route::get('/user/create', UserCreate::class);
  Route::get('/user/{user}/edit', UserEdit::class);
  Route::get('/user/{user}/show', UserShow::class);
  Route::get('/user/cetakKartu/{user}', [UserController::class, 'cetakKartu']);
  // crud user end


  // crud santri start
  Route::get('/santri', SantriList::class);
  Route::get('/santri/create', SantriCreate::class);
  Route::get('/santri/show/{santri}', SantriShow::class);
  Route::get('/santri/{santri}/edit', SantriEdit::class);
  Route::get('/santri/cetakKartuSantri/{santri}', [SantriController::class, 'downloadKartuSantri']);
  Route::get('/santri/cetakKartuWaliSantri/{santri}', [SantriController::class, 'downloadKartuWaliSantri']);
  // crud santri end
  

  // crud pelajaran start
  Route::get('/pelajaran/{lembaga}', PelajaranList::class);
  // crud pelajaran end


  // crud ekstra start
  Route::get('/ekstrakurikuler', EkstrakurikulerList::class);
  Route::get('/ekstra/editRombel/{ekstrakurikuler}', EkstrakurikulerRombel::class);
  // crud ekstra end


  // crud referensi poin start
  Route::get('/referensiPoin', ReferensiPoinList::class);
  // crud referensi poin end

  // perbaikan presensi start
  Route::get('/{lembaga}/superadmin/perbaikanPresensi', PerbaikanPresensi::class);
  // perbaikan presensi end

  // perbaikan presensi sholat start
      Route::get('/superadmin/perbaikanPresensiSholat', PerbaikanPresensiSholat::class);
  // perbaikan presensi sholat end
  // jadwal pelajaran end
  
  Route::get('/superadmin/perbaikanPresensiEkstrakurikuler', PerbaikanPresensiEkstrakurikuler::class);
  
  Route::get('/superadmin/perbaikanPresensiSholatPendamping', PerbaikanPresensiSholatPendamping::class);
  
  Route::get('/superadmin/perbaikanPresensiKegiatanAsatidz', PerbaikanPresensiKegiatanAsatidz::class);
  
  Route::get('/{lembaga}/superadmin/perbaikanPresensiInsidentilSantri', PerbaikanPresensiInsidentilSantriList::class);
  
  Route::get('/{lembaga}/superadmin/rekapPresensi', RekapPresensiList::class);
  
  Route::get('/superadmin/rekapPelanggaran', RekapPelanggaranList::class);
  Route::get('/superadmin/rekapPembinaan', RekapPembinaanList::class);
  Route::get('/superadmin/rekapPenghargaan', RekapPenghargaanList::class);
  
  
    // tahun ajaran start
    Route::get('/tahunAjaran', TahunAjaranList::class);
    // tahun ajaran end
  
    // jadwal pelajaran start
    
    Route::get('/{lembaga}/superadmin/jadwalPelajaran', JadwalPelajaranList::class);
    Route::post('/{lembaga}/superadmin/jadwalPelajaran', [JadwalPelajaranList::class, 'simpan']);
  
  Route::get('/raporSantri/{kelas}/superadmin', RaporSantriList::class);
  Route::get('/raporSantri/detail/{santri}/{kelas}/superadmin', RaporSantriDetail::class);

  Route::get('/{lembaga}/superadmin/raporLembaga', RaporLembagaList::class);
  Route::get('/{lembaga}/superadmin/raporLembaga/detail/{user}', RaporLembagaDetail::class);

  
  // Batas Poin start
  Route::get('/batasPoin', BatasPoinList::class);
  Route::get('/batasPoin/tambah', BatasPoinCreate::class);
  Route::get('/batasPoin/edit/{batasPoin}', BatasPoinEdit::class);
  // Batas Poin end

  

  // perbaikan presensi asrama start
  Route::get('/{lembaga}/superadmin/perbaikanPresensiAsrama', PerbaikanPresensiAsrama::class);
  // perbaikan presensi asrama end

  
  // Rapor Pendamping start
  Route::get('/{lembaga}/superadmin/raporPendamping', RaporPendampingList::class);
  Route::get('/{lembaga}/superadmin/raporPendamping/detail/{user}', RaporPendampingDetail::class);
  // Rapor Pendamping End