<?php

namespace App\Livewire\PresensiAsrama;

use App\Models\Kelas;
use App\Models\Santri;
use Livewire\Component;
use App\Models\IzinSakitSantri;
use App\Models\IzinKeluarSantri;
use App\Models\IzinPulangSantri;
use App\Jobs\StorePresensiAsrama;
use App\Models\JurnalPresensiAsrama;
use App\Models\Lembaga;

class PresensiAsramaCreate extends Component
{

    public $santris;
    public $selectedKamar;
    public $kegiatan;
    public $role;
    public $lembaga;

    
    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
    }

    public function pilih()
    {
        $this->santris = Santri::santriAktif()->where('kelas_asrama_id', $this->selectedKamar)->orderBy('name', 'asc')->get();
    }

    public function tambah()
    {
       $data = [
            'santri_id' => request()->santri_id,
            'user_id' => auth()->user()->id,
            'kegiatan' => request()->kegiatan,
            'keterangans' => request()->keterangans,
            'lembaga' => request()->lembaga,
            'role' => request()->role,
        ];
        dispatch(new StorePresensiAsrama($data));

        JurnalPresensiAsrama::create([
          'lembaga_id' => request()->lembaga,
          'user_id' => auth()->user()->id,
          'kelas_id' => request()->kamar,
          'kegiatan' => request()->kegiatan
        ]);

        session()->flash('success', 'Presensi Asrama berhasil');
        return redirect('/'. request()->lembaga . '/' . request()->role . '/presensiAsrama');
    }


    public function render()
    {
        if ($this->role == 'pengurus') {
          $kamar = Kelas::where('lembaga_id', $this->lembaga->id)->get();
        } else {
          $kamar = Kelas::where('lembaga_id', $this->lembaga->id)->whereRelation('userMengajar', 'user_id', auth()->user()->id)->get();
        }
        return view('livewire.presensi-asrama.presensi-asrama-create', [
            'santris' => $this->santris,
            'kamar' => $kamar,
            'izinKeluarSantris' => IzinKeluarSantri::getIzinKeluarSantriBerlaku(),
            'izinPulangSantris' => IzinPulangSantri::getIzinPulangSantriBerlaku(),
            'izinSakitSantris' => IzinSakitSantri::getIzinSakitSantriBerlaku(),
        ])->title('Tambah Presensi Asrama ' . $this->lembaga->nama);
    }
}
