<?php

namespace App\Livewire\Dashboard;

use App\Models\JadwalPelajaran;
use App\Models\User;
use App\Models\Santri;
use App\Models\Lembaga;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\Title;

class Dashboard extends Component
{
  #[Computed]
    public function render()
    {
        return view('livewire.dashboard.dashboard', [
          'santriAktif' => Santri::with('dataSantri')->santriAktif()->get(),
          'asatidzAktif' => User::userAktif()->get(),
          'santriKota' => Santri::kabupaten('KOTA BLITAR')->get(),
          'santriKabupaten' => Santri::kabupaten('KABUPATEN BLITAR')->get(),
          'santriLuar' => Santri::kabupaten()->get(),
          'santriPutra' => Santri::whereRelation('dataSantri', 'jenis_kelamin', 'Laki-laki')->get(),
          'santriPutri' => Santri::whereRelation('dataSantri', 'jenis_kelamin', 'Perempuan')->get(),
          'asatidzPutra' => User::whereRelation('dataUser', 'jenis_kelamin', 'Laki-laki')->get(),
          'asatidzPutri' => User::whereRelation('dataUser', 'jenis_kelamin', 'Perempuan')->get(),
          'lembagaSemua' => Lembaga::with('kelas')->get(),
          'jadwals' => JadwalPelajaran::with('pelajaran', 'lembaga', 'kelas')->where('hari', getHari(date('Y-m-d', time())))->where('user_id', auth()->user()->id)->get()
        ])->title('Selamat Datang ' . auth()->user()->name);
    }
}
