<?php

namespace App\Livewire\RaporPendamping;

use App\Models\IzinKeluarPendamping;
use App\Models\IzinPulangPendamping;
use App\Models\JurnalPresensiAsrama;
use App\Models\JurnalPresensiInsidentilSantri;
use App\Models\JurnalSholatSantri;
use App\Models\Lembaga;
use App\Models\PelanggaranPendamping;
use App\Models\PresensiKegiatanAsatidz;
use App\Models\PresensiSholatPendamping;
use App\Models\User;
use Livewire\Component;

class RaporPendampingDetail extends Component
{
    public $lembaga;
    public $role;
    public $user;

    public function mount(Lembaga $lembaga, User $user)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
      $this->user = $user;
    }
    public function render()
    {
        return view('livewire.rapor-pendamping.rapor-pendamping-detail', [
          'presensiSholats' => PresensiSholatPendamping::where('lembaga_id', $this->lembaga->id)->where('user_id', $this->user->id)->latest()->paginate(20, pageName: 'sholat-asatidz-page'),
          'presensiKegiatans' => PresensiKegiatanAsatidz::where('lembaga_id', $this->lembaga->id)->where('user_id', $this->user->id)->latest()->paginate(20, pageName: 'kegiatan-asatidz-page'),
          'jurnalAsramas' => JurnalPresensiAsrama::where('lembaga_id', $this->lembaga->id)->where('user_id', $this->user->id)->latest()->paginate(20, pageName: 'jurnal-asrama-page'),
          'jurnalSholats' => JurnalSholatSantri::where('lembaga_id', $this->lembaga->id)->where('user_id', $this->user->id)->latest()->paginate(20, pageName: 'jurnal-sholat-page'),
          'jurnalInsidentils' => JurnalPresensiInsidentilSantri::where('lembaga_id', $this->lembaga->id)->where('user_id', $this->user->id)->latest()->paginate(20, pageName: 'jurnal-insidentil-page'),
          'pelanggarans' => PelanggaranPendamping::where('user_id', $this->user->id)->latest()->paginate(20, pageName: 'pelanggaran-page'),
          'izinKeluars' => IzinKeluarPendamping::where('user_id', $this->user->id)->latest()->paginate(20, pageName: 'izin-keluar-page'),
          'izinPulangs' => IzinPulangPendamping::where('user_id', $this->user->id)->latest()->paginate(20, pageName: 'izin-pulang-page'),
        ])->title('Detail Rapor Pendamping ' . $this->user->name );
    }
}
