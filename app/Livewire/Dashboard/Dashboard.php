<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use App\Models\Santri;
use App\Models\Lembaga;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\JadwalPelajaran;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Cache;

class Dashboard extends Component
{
  public function render()
  {
      $santriAktif = Cache::remember('santri_aktif', Carbon::now()->addDays(7), function() {
        return Santri::with('dataSantri')->santriAktif()->get();
      });
      
      $asatidzAktif = Cache::remember('asatidz_aktif', Carbon::now()->addDays(7), function() {
        return User::with('dataUser')->userAktif()->get();
      });

      $santriKota = Cache::remember('santri_kota', Carbon::now()->addDays(7), function() {
        return Santri::kabupaten('KOTA BLITAR')->get();
      });

      $santriKab = Cache::remember('santri_kab', Carbon::now()->addDays(7), function() {
        return Santri::kabupaten('KABUPATEN BLITAR')->get();
      });

      $santriLuar = Cache::remember('santri_luar', Carbon::now()->addDays(7), function() {
        return Santri::kabupaten()->get();
      });

      $santriPutra = Cache::remember('santri_putra', Carbon::now()->addDays(7), function() {
        return Santri::santriByJenisKelamin('Laki-laki')->get();
      });

      $santriPutri = Cache::remember('santri_putri', Carbon::now()->addDays(7), function() {
        return Santri::santriByJenisKelamin('Perempuan')->get();
      });

      $asatidzPutra = Cache::remember('asatidz_putra', Carbon::now()->addDays(7), function() {
        return User::userByJenisKelamin('Laki-laki')->get();
      });

      $asatidzPutri = Cache::remember('asatidz_putri', Carbon::now()->addDays(7), function() {
        return User::userByJenisKelamin('Perempuan')->get();
      });

      $lembagaDashboard = Cache::remember('lembaga_dashboard', Carbon::now()->addDays(7), function() {
        return Lembaga::with('kelas')->get();
      });
    
        return view('livewire.dashboard.dashboard', [
          'santriAktif' => $santriAktif,
          'asatidzAktif' => $asatidzAktif,
          'santriKota' => $santriKota,
          'santriKabupaten' => $santriKab,
          'santriLuar' => $santriLuar,
          'santriPutra' => $santriPutra,
          'santriPutri' => $santriPutri,
          'asatidzPutra' => $asatidzPutra,
          'asatidzPutri' => $asatidzPutri,
          'lembagaSemua' => $lembagaDashboard,
          'jadwals' => JadwalPelajaran::with('pelajaran', 'lembaga', 'kelas')->where('hari', getHari(date('Y-m-d', time())))->where('user_id', auth()->user()->id)->get()
        ])->title('Selamat Datang ' . auth()->user()->name);
    }
}
