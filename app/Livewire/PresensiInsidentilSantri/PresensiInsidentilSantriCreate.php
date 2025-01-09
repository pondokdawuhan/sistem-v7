<?php

namespace App\Livewire\PresensiInsidentilSantri;

use App\Jobs\StorePresensiInsidentilSantri;
use App\Models\Kelas;
use App\Models\Santri;
use App\Models\Lembaga;
use Livewire\Component;
use App\Models\IzinSakitSantri;
use App\Models\IzinKeluarSantri;
use App\Models\IzinPulangSantri;
use App\Models\JurnalPresensiInsidentilSantri;

class PresensiInsidentilSantriCreate extends Component
{
    public $lembaga;
    public $role;
    public $selectedKelas;
    public $kegiatan;

    public $santris;

    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
    }

    public function pilih()
    {
      $this->validate([
        'selectedKelas' => 'required',
        'kegiatan' => 'required'
      ]);

       switch ($this->lembaga->jenis_lembaga) {
              case 'FORMAL':
                $this->santris = Santri::where('kelas_formal_id', $this->selectedKelas)->orderBy('name', 'asc')->get();
                break;
              case 'MADIN':
                $this->santris = Santri::where('kelas_madin_id', $this->selectedKelas)->orderBy('name', 'asc')->get();
                break;
              
              case 'TPQ':
                $this->santris = Santri::where('kelas_tpq_id', $this->selectedKelas)->orderBy('name', 'asc')->get();
                break;
              case 'ASRAMA':
                $this->santris = Santri::where('kelas_asrama_id', $this->selectedKelas)->orderBy('name', 'asc')->get();
                break;
      }


    }

    public function tambah()
    {
      $data = [
            'santri_id' => request()->santri_id,
            'user_id' => auth()->user()->id,
            'kegiatan' => request()->kegiatan,
            'keterangans' => request()->keterangans,
            'lembaga_id' => request()->lembaga_id,
            'lembaga_name' => request()->lembaga_name
        ];

       
        dispatch(new StorePresensiInsidentilSantri($data));

        JurnalPresensiInsidentilSantri::create([
          'lembaga_id' => request()->lembaga_id,
          'user_id' => auth()->user()->id,
          'kelas_id' => request()->kelas_id,
          'kegiatan' => request()->kegiatan
        ]);

        session()->flash('success', 'Presensi Insidentil Santri berhasil');
        return redirect('/'. request()->lembaga_id . '/' .request()->role . '/presensiInsidentilSantri');
    }

    public function render()
    {
        if ($this->role == 'walikelas' || $this->role == 'pendamping') {
          $kelas = Kelas::where('lembaga_id', $this->lembaga->id)->where('user_id', auth()->user()->id)->get();
        } else {
          $kelas = Kelas::where('lembaga_id', $this->lembaga->id)->get();
        }
        return view('livewire.presensi-insidentil-santri.presensi-insidentil-santri-create', [
            'santris' => $this->santris,
            'kelas' => $kelas,
            'izinKeluarSantris' => IzinKeluarSantri::getIzinKeluarSantriBerlaku(),
            'izinPulangSantris' => IzinPulangSantri::getIzinPulangSantriBerlaku(),
            'izinSakitSantris' => IzinSakitSantri::getIzinSakitSantriBerlaku(),
        ])->title('Tambah presensi insidentil ' . $this->lembaga->nama);
    }
}
