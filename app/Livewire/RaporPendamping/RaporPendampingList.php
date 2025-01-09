<?php

namespace App\Livewire\RaporPendamping;

use App\Models\JurnalPresensiAsrama;
use App\Models\JurnalPresensiInsidentilSantri;
use App\Models\JurnalSholatSantri;
use App\Models\Lembaga;
use App\Models\TahunAjaran;
use App\Models\User;
use Livewire\Component;

class RaporPendampingList extends Component
{
    public $lembaga;
    public $role;
    public $selectedBulan;
    public $tahunAjaran;


    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
      $this->tahunAjaran = explode('/', TahunAjaran::latest()->first()->tahun);
      $this->selectedBulan = date('n|Y', time());


    }
    public function render()
    {
        $bulanTahun = explode('|', $this->selectedBulan);
        $users = User::with('poinPendamping')->whereRelation('lembaga', 'nama', $this->lembaga->nama)->whereRelation('roles', 'name', 'pendamping')->orWhereRelation('roles', 'name', 'pengurus')->whereRelation('lembaga', 'nama', $this->lembaga->nama)->orderBy('name', 'asc')->get();
        return view('livewire.rapor-pendamping.rapor-pendamping-list', [
          'users' => $users,
          'jurnalAsramas' => JurnalPresensiAsrama::where('lembaga_id', $this->lembaga->id)->whereYear('created_at', $bulanTahun[1])->whereMonth('created_at', $bulanTahun[0])->get(),
          'jurnalInsidentils' => JurnalPresensiInsidentilSantri::where('lembaga_id', $this->lembaga->id)->whereYear('created_at', $bulanTahun[1])->whereMonth('created_at', $bulanTahun[0])->get(),
          'jurnalSholats' => JurnalSholatSantri::where('lembaga_id', $this->lembaga->id)->whereYear('created_at', $bulanTahun[1])->whereMonth('created_at', $bulanTahun[0])->get(),
        ])->title('Rapor Pendamping ' . $this->lembaga->nama);
    }
}
