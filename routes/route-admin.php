<?php

use App\Livewire\Kelas\KelasList;
use App\Livewire\Kelas\KelasRombel;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pelajaran\PelajaranList;
use App\Livewire\RaporSantri\RaporSantriList;
use App\Livewire\RaporLembaga\RaporLembagaList;
use App\Livewire\RaporSantri\RaporSantriDetail;
use App\Livewire\RaporLembaga\RaporLembagaDetail;
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
use App\Livewire\RekapPresensiJumlah\RekapPresensiJumlahList;
use App\Livewire\PerbaikanPresensi\PerbaikanPresensiEkstrakurikuler;
use App\Livewire\PerbaikanPresensi\PerbaikanPresensiKegiatanAsatidz;
use App\Livewire\PerbaikanPresensi\PerbaikanPresensiSholatPendamping;
use App\Livewire\PerbaikanPresensiInsidentilSantri\PerbaikanPresensiInsidentilSantriList;


// crud kelas start
Route::get('/kelas/{lembaga}', KelasList::class);
Route::get('/editRombel/{lembaga}/{kelas}', KelasRombel::class);
// crud kelas end



// crud pelajaran start
Route::get('/pelajaran/{lembaga}', PelajaranList::class);
// crud pelajaran end


// crud ekstra start
Route::get('/ekstrakurikuler', EkstrakurikulerList::class);
Route::get('/ekstra/editRombel/{ekstrakurikuler}', EkstrakurikulerRombel::class);
// crud ekstra end


// perbaikan presensi start
Route::get('/{lembaga}/admin/perbaikanPresensi', PerbaikanPresensi::class);
// perbaikan presensi end

// perbaikan presensi sholat start
Route::get('/admin/perbaikanPresensiSholat', PerbaikanPresensiSholat::class);
// perbaikan presensi sholat end

// perbaikan presensi insidentil santri start
Route::get('/{lembaga}/admin/perbaikanPresensiInsidentilSantri', PerbaikanPresensiInsidentilSantriList::class);
// perbaikan presensi insidentil santri end

Route::get('/admin/perbaikanPresensiEkstrakurikuler', PerbaikanPresensiEkstrakurikuler::class);

Route::get('/admin/perbaikanPresensiSholatPendamping', PerbaikanPresensiSholatPendamping::class);

Route::get('/admin/perbaikanPresensiKegiatanAsatidz', PerbaikanPresensiKegiatanAsatidz::class);

Route::get('/{lembaga}/admin/rekapPresensi', RekapPresensiList::class);

// jadwal pelajaran start

Route::get('/{lembaga}/admin/jadwalPelajaran', JadwalPelajaranList::class);
Route::post('/{lembaga}/admin/jadwalPelajaran', [JadwalPelajaranList::class, 'simpan']);
// jadwal pelajaran end

Route::get('/admin/rekapPelanggaran', RekapPelanggaranList::class);
Route::get('/admin/rekapPembinaan', RekapPembinaanList::class);
Route::get('/admin/rekapPenghargaan', RekapPenghargaanList::class);


Route::get('/raporSantri/{kelas}/admin', RaporSantriList::class);
Route::get('/raporSantri/detail/{santri}/{kelas}/admin', RaporSantriDetail::class);

Route::get('/{lembaga}/admin/raporLembaga', RaporLembagaList::class);
Route::get('/{lembaga}/admin/raporLembaga/detail/{user}', RaporLembagaDetail::class);

// perbaikan presensi asrama start
Route::get('/{lembaga}/superadmin/perbaikanPresensiAsrama', PerbaikanPresensiAsrama::class);
// perbaikan presensi asrama end


// Rapor Pendamping start
Route::get('/{lembaga}/admin/raporPendamping', RaporPendampingList::class);
Route::get('/{lembaga}/admin/raporPendamping/detail/{user}', RaporPendampingDetail::class);
// Rapor Pendamping End

// Rekap Presensi Jumlah Start
Route::get('/{lembaga}/admin/rekapPresensiJumlah', RekapPresensiJumlahList::class);
  // Rekap Presensi Jumlah End