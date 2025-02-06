<?php

use App\Livewire\Login\Login;
use App\Models\CatatanAsatidz;
use App\Livewire\Profil\Profil;
use App\Livewire\Alumni\AlumniEdit;
use App\Livewire\Alumni\AlumniList;
use App\Livewire\Profil\ProfilEdit;
use App\Livewire\Alumni\AlumniCreate;
use App\Livewire\Dashboard\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Livewire\BatasPoin\BatasPoinEdit;
use App\Livewire\BatasPoin\BatasPoinList;
use App\Livewire\Kelulusan\KelulusanList;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\CronjobController;
use App\Livewire\BatasPoin\BatasPoinCreate;
use App\Livewire\CatatanSantri\CatatanSantriEdit;
use App\Livewire\CatatanAsatidz\CatatanAsatidzEdit;
use App\Livewire\CatatanAsatidz\CatatanAsatidzList;
use App\Livewire\PresensiAsrama\PresensiAsramaList;
use App\Livewire\CatatanAsatidz\CatatanAsatidzCreate;
use App\Livewire\CatatanAsatidz\CatatanAsatidzDetail;
use App\Livewire\PresensiAsrama\PresensiAsramaCreate;
use App\Livewire\RaporPendamping\RaporPendampingList;
use App\Livewire\RaporPendamping\RaporPendampingDetail;
use App\Livewire\CekPresensiAsrama\CekPresensiAsramaList;
use App\Livewire\PerbaikanPresensi\PerbaikanPresensiAsrama;
use App\Livewire\RekapPresensiJumlah\RekapPresensiJumlahList;

Route::get('/', Login::class)->name('login')->middleware('guest');
Route::get('/auth/google/redirect', [GoogleController::class, 'redirect']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('/logout', [Login::class, 'logout']);


Route::middleware('auth')->group(function () {


  // Rekap Presensi Jumlah Start

  Route::get('/{lembaga}/superadmin/rekapPresensiJumlah', RekapPresensiJumlahList::class);
  // Rekap Presensi Jumlah End

  // untuk semua
  Route::get('/dashboard', Dashboard::class);
  Route::get('/profil/{username}', Profil::class);
  Route::get('/editProfil/{username}',  ProfilEdit::class);


  // Role khusus super admin
  Route::middleware('role:Super Admin')->group(function () {
    require __DIR__ . '/route-super-admin.php';
  });

  // Role khusus admin
  Route::middleware('role:Admin|Super Admin')->group(function () {
    require __DIR__ . '/route-admin.php';
  });

  // role khusus guru
  Route::middleware('role:Guru|Super Admin')->group(function () {
    require __DIR__ . '/route-guru.php';
  });

  // role khusus guru piket
  Route::middleware('role:Guru Piket|Super Admin')->group(function () {
    require __DIR__ . '/route-guru-piket.php';
  });

  // role khusus pengasuh
  Route::middleware('role:Pengasuh|Super Admin')->group(function () {
    require __DIR__ . '/route-pengasuh.php';
  });

  // role khusus guru ekstra
  Route::middleware('role:Guru Ekstra|Super Admin')->group(function () {
    require __DIR__ . '/route-guru-ekstra.php';
  });

  // role khusus pengurus
  Route::middleware('role:Pengurus|Super Admin')->group(function () {
    require __DIR__ . '/route-pengurus.php';
  });

  // role khusus pendamping
  Route::middleware('role:Pendamping|Super Admin')->group(function () {
    require __DIR__ . '/route-pendamping.php';
  });

  // role khusus keamanan
  Route::middleware('role:Keamanan|Super Admin')->group(function () {
    require __DIR__ . '/route-keamanan.php';
  });

  // role khusus kesiswaan
  Route::middleware('role:Kesiswaan|Super Admin')->group(function () {
    require __DIR__ . '/route-kesiswaan.php';
  });

  // role khusus kepala
  Route::middleware('role:Kepala|Super Admin')->group(function () {
    require __DIR__ . '/route-kepala.php';
  });

  // role khusus ketertiban
  Route::middleware('role:Ketertiban|Super Admin')->group(function () {
    require __DIR__ . '/route-ketertiban.php';
  });

  // role khusus wali kelas
  Route::middleware('role:Wali Kelas|Super Admin')->group(function () {
    require __DIR__ . '/route-wali-kelas.php';
  });

  // role khusus ketua asrama
  Route::middleware('role:Ketua Asrama|Super Admin')->group(function () {
    require __DIR__ . '/route-ketua-asrama.php';
  });

  // role khusus kurikulum
  Route::middleware('role:Kurikulum|Super Admin')->group(function () {
    require __DIR__ . '/route-kurikulum.php';
  });

  // role khusus yayasan
  Route::middleware('role:Yayasan|Super Admin')->group(function () {
    require __DIR__ . '/route-yayasan.php';
  });
});
