<?php

namespace App\Livewire\RaporLembaga;

use App\Models\IzinAsatidz;
use App\Models\JadwalPelajaran;
use App\Models\Jurnal;
use App\Models\JurnalEkstrakurikuler;
use App\Models\JurnalPresensiInsidentilSantri;
use App\Models\JurnalSholatSantri;
use App\Models\Lembaga;
use App\Models\TahunAjaran;
use App\Models\User;
use Livewire\Component;

class RaporLembagaList extends Component
{
    public $lembaga;
    public $role;
    public $tahunAjaran;
    public $selectedBulan;


    public function mount(Lembaga $lembaga)
    {
      $this->tahunAjaran = explode('/', TahunAjaran::latest()->first()->tahun);
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
      $this->selectedBulan = date('n|Y', time());
      
      


    }
    public function render()
    {
        $user = User::with('izinAsatidz', 'pelajaran', 'jurnal', 'jurnalSholatSantri', 'jurnalPresensiInsidentilSantri', 'jadwalPelajaran')->whereRelation('lembaga', 'nama', $this->lembaga->nama)->orderBy('name', 'asc')->get();

        $bulanTahun = explode('|', $this->selectedBulan);
        $pekanEfektif = pekanEfektif($bulanTahun[0], $bulanTahun[1]);
        
        return view('livewire.rapor-lembaga.rapor-lembaga-list', [
        'users' => $user,
        'jadwals' => JadwalPelajaran::with('user')->where('lembaga_id', $this->lembaga->id)->get(),
        'pekanEfektif' => $pekanEfektif,
        'jurnals' => Jurnal::where('lembaga_id', $this->lembaga->id)->where('is_guru_piket', false)->whereYear('created_at', $bulanTahun[1])->whereMonth('created_at', $bulanTahun[0])->get(),
        'izinAsatidzs' => IzinAsatidz::where('lembaga_id', $this->lembaga->id)->whereYear('created_at', $bulanTahun[1])->whereMonth('created_at', $bulanTahun[0])->get(),
        'jurnalSholats' => JurnalSholatSantri::where('lembaga_id', $this->lembaga->id)->whereYear('created_at', $bulanTahun[1])->whereMonth('created_at', $bulanTahun[0])->get(),
        'jurnalInsidentils' => JurnalPresensiInsidentilSantri::where('lembaga_id', $this->lembaga->id)->whereYear('created_at', $bulanTahun[1])->whereMonth('created_at', $bulanTahun[0])->get()
        ])->title('Rapor Asatidz ' . $this->lembaga->nama);
    }
}
