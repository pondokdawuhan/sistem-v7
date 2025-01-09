<?php

namespace App\Livewire\RaporLembaga;

use App\Models\IzinAsatidz;
use App\Models\Jurnal;
use App\Models\JurnalEkstrakurikuler;
use App\Models\JurnalPresensiInsidentilSantri;
use App\Models\JurnalSholatSantri;
use App\Models\Lembaga;
use App\Models\User;
use App\Models\PresensiKegiatanAsatidz;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class RaporLembagaDetail extends Component
{
  use WithPagination, WithoutUrlPagination;
    public $lembaga;
    public $user;
    public $role;

    public function mount(Lembaga $lembaga, User $user)
    {
      $this->lembaga = $lembaga;
      $this->user = $user;
      $this->role = explode('/', request()->path())[1];
    }

    public function render()
    {
        
        return view('livewire.rapor-lembaga.rapor-lembaga-detail', [
          'jurnals' => Jurnal::with('kelas', 'pelajaran')->where('lembaga_id', $this->lembaga->id)->where('user_id', $this->user->id)->latest()->paginate(20, pageName: 'jurnal'),
          'izinAsatidz' => IzinAsatidz::where('lembaga_id', $this->lembaga->id)->where('user_id', $this->user->id)->latest()->paginate(20, pageName: 'izin'),
          'jurnalEkstra' => JurnalEkstrakurikuler::with('ekstrakurikuler')->where('user_id', $this->user->id)->latest()->paginate(20, pageName: 'ekstra'),
          'jurnalInsidentil' => JurnalPresensiInsidentilSantri::where('lembaga_id', $this->lembaga->id)->where('user_id', $this->user->id)->latest()->paginate(20, pageName: 'insidentil'),
          'jurnalSholat' => JurnalSholatSantri::where('lembaga_id', $this->lembaga->id)->where('user_id', $this->user->id)->latest()->paginate(20, pageName: 'sholat'),
          'presensiKegiatans' => PresensiKegiatanAsatidz::where('lembaga_id', $this->lembaga->id)->where('user_id', $this->user->id)->latest()->paginate(20, pageName: 'presensiKegiatanAsatidz'),
        ])->title('Detail Rapor ' . $this->user->name);
    }
}
