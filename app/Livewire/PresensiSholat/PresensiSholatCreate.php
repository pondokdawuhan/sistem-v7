<?php

namespace App\Livewire\PresensiSholat;

use App\Models\Kelas;
use App\Models\Santri;
use App\Models\Lembaga;
use Livewire\Component;
use App\Models\HaidSantri;
use App\Models\IzinSakitSantri;
use App\Models\IzinKeluarSantri;
use App\Models\IzinPulangSantri;
use App\Jobs\StorePresensiSholat;
use App\Models\JurnalSholatSantri;

class PresensiSholatCreate extends Component
{
    public $lembaga;
    public $role;
    public $kelas;
    public $waktu;
    public $santris;
    public $selectedKelas;

    public function mount(Lembaga $lembaga)
    {
      $this->role = explode('/', request()->path())[1];
      $this->lembaga = $lembaga;
    }

    public function pilih()
    {
            switch ($this->lembaga->jenis_lembaga) {
                case 'FORMAL':
                    $this->santris = Santri::with('dataSantri')->santriAktif()->where('kelas_formal_id', $this->kelas)->orderBy('name', 'asc')->get();
                    break;
                case 'MADIN':
                    $this->santris = Santri::with('dataSantri')->santriAktif()->where('kelas_madin_id', $this->kelas)->orderBy('name', 'asc')->get();
                    break;
                case 'TPQ':
                    $this->santris = Santri::with('dataSantri')->santriAktif()->where('kelas_tpq_id', $this->kelas)->orderBy('name', 'asc')->get();
                    break;
                case 'ASRAMA':
                    $this->santris = Santri::with('dataSantri')->santriAktif()->where('kelas_asrama_id', $this->kelas)->orderBy('name', 'asc')->get();
                    break;
                
            }

            $this->selectedKelas = $this->kelas;
    }


    public function tambah()
    {
      $data = [
            'santri_id' => request()->santri_id,
            'lembaga' => request()->lembaga,
            'role' => request()->role,
            'waktu' => request()->waktu,
            'keterangans' => request()->keterangans,
            'user_id' => auth()->user()->id
        ];

        dispatch(new StorePresensiSholat($data));

        JurnalSholatSantri::create([
          'user_id' => auth()->user()->id,
          'lembaga_id' => request()->lembaga,
          'kelas_id' => request()->kelas_id,
          'waktu' => request()->waktu
        ]);

        session()->flash('success', 'Presensi berhasil ditambahkan');
        return redirect( '/' . $data['lembaga'] . '/' . $data['role'] .'/presensiSholat');
    }

    public function render()
    {

        $kls = Kelas::where('lembaga_id', $this->lembaga->id)->get();

        return view('livewire.presensi-sholat.presensi-sholat-create', [
            'kelass' => $kls,
            'lembaga' => $this->lembaga->id,
            'santris' => $this->santris,
            'izinKeluarSantris' => IzinKeluarSantri::getIzinKeluarSantriBerlaku(),
            'izinPulangSantris' => IzinPulangSantri::getIzinPulangSantriBerlaku(),
            'izinSakitSantris' => IzinSakitSantri::getIzinSakitSantriBerlaku(),
            'santriHaid' => HaidSantri::santriHaid(),
            'santriIstihadloh' => HaidSantri::santriIstihadloh()
        ]);
    }
}
