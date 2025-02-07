<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CekPresensi\CekPresensiList;
use App\Livewire\RaporSantri\RaporSantriList;
use App\Livewire\RaporLembaga\RaporLembagaList;
use App\Livewire\RaporSantri\RaporSantriDetail;
use App\Livewire\RaporLembaga\RaporLembagaDetail;
use App\Livewire\PembinaanSantri\PembinaanSantriEdit;
use App\Livewire\PembinaanSantri\PembinaanSantriList;
use App\Livewire\RaporPendamping\RaporPendampingList;
use App\Livewire\IzinPulangSantri\IzinPulangSantriList;
use App\Livewire\PembinaanSantri\PembinaanSantriCreate;
use App\Livewire\PembinaanSantri\PembinaanSantriDetail;
use App\Livewire\RaporPendamping\RaporPendampingDetail;
use App\Livewire\CekPresensi\CekPresensiSholatSantriList;
use App\Livewire\CekPresensiAsrama\CekPresensiAsramaList;
use App\Livewire\IzinPulangSantri\IzinPulangSantriDetail;
use App\Livewire\RekapPresensiJumlah\RekapPresensiJumlahList;
use App\Livewire\IzinPulangPendamping\IzinPulangPendampingList;
use App\Livewire\IzinPulangPendamping\IzinPulangPendampingDetail;
use App\Livewire\CekPresensiInsidentilSantri\CekPresensiInsidentilSantriList;



// crud izin pulang santri by pengasuh start
Route::get('/semua/pengasuh/izinPulangSantri', IzinPulangSantriList::class);
Route::get('/semua/pengasuh/detailIzinPulangSantri/{santri}', IzinPulangSantriDetail::class);
// crud izin pulang santri by pengasuh start


// crud izin pulang pendamping by pengasuh start
Route::get('/pengasuh/izinPulangPendamping', IzinPulangPendampingList::class);
Route::get('/pengasuh/izinPulangPendamping/detail/{user}', IzinPulangPendampingDetail::class);
// crud izin pulang pendamping by pengasuh end



// crud pembinaan santri start
Route::get('/{lembaga}/pengasuh/pembinaanSantri', PembinaanSantriList::class);
Route::get('/{lembaga}/pengasuh/pembinaanSantri/create', PembinaanSantriCreate::class);
Route::get('/{lembaga}/pengasuh/pembinaanSantri/{pembinaanSantri}/edit', PembinaanSantriEdit::class);
Route::get('/{lembaga}/pengasuh/pembinaanSantri/detail/{santri}', PembinaanSantriDetail::class);
// crud pembinaan santri end


// cek presensi sholat santri start
Route::get('/{lembaga}/pengasuh/cekPresensiSholatSantri', CekPresensiSholatSantriList::class);
// cek preesnsi sholat santri end


// cek presensi insidentil santri start
Route::get('/{lembaga}/pengasuh/cekPresensiInsidentilSantri', CekPresensiInsidentilSantriList::class);
// cek presensi insidentil santri end


Route::get('/{lembaga}/pengasuh/raporLembaga', RaporLembagaList::class);
Route::get('/{lembaga}/pengasuh/raporLembaga/detail/{user}', RaporLembagaDetail::class);

Route::get('/raporSantri/{kelas}/pengasuh', RaporSantriList::class);
Route::get('/raporSantri/detail/{santri}/{kelas}/pengasuh', RaporSantriDetail::class);


// Rapor Pendamping start
Route::get('/{lembaga}/pengasuh/raporPendamping', RaporPendampingList::class);
Route::get('/{lembaga}/pengasuh/raporPendamping/detail/{user}', RaporPendampingDetail::class);
// Rapor Pendamping End

// cek presensi start
Route::get('/{lembaga}/pengasuh/cekPresensi', CekPresensiList::class);
// cek presensi end

// cek presensi asrama start
Route::get('/{lembaga}/pengasuh/cekPresensiAsrama', CekPresensiAsramaList::class);
// cek presensi asrama end

// Rekap Presensi Jumlah Start
Route::get('/{lembaga}/pengasuh/rekapPresensiJumlah', RekapPresensiJumlahList::class);
  // Rekap Presensi Jumlah End