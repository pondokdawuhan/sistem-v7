<?php

namespace App\Livewire\IzinSakitSantri;

use App\Models\Kelas;
use App\Models\Santri;
use Livewire\Component;
use App\Models\IzinSakitSantri;
use App\Models\Lembaga;

class IzinSakitSantriCreate extends Component
{
    public $role;
    public $lembaga;
    public $userId;
    public $keluhan;

    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
    }

    public function tambah()
    {
      $data = $this->validate([
            'keluhan' => 'required'
        ]);


        $data['tanggal'] = date('Y-m-d', time());
        $data['user_id'] = auth()->user()->id;
        $data['lembaga_id'] = $this->lembaga->id;
        foreach ($this->userId as $santriId) {
            $data['santri_id'] = $santriId;

            IzinSakitSantri::create($data);
        }

        session()->flash('success', 'Izin Sakit berhasil ditambahkan');
        return $this->redirect('/' . $this->lembaga->id . '/' . $this->role . '/izinSakitSantri', true);
    }

    public function render()
    {
        switch ($this->role) {
          case 'pendamping':
            $kelas = Kelas::where('lembaga_id', $this->lembaga->id)->where('user_id', auth()->user()->id)->get();
            $array = [];
            if ($kelas) {
              foreach ($kelas as $kls) {
                array_push($array, $kls->id);
              }
            }
            $santris = Santri::whereIn('kelas_asrama_id', $array)->get();
            break;
          case 'pengurus':
            $kelas = Kelas::where('lembaga_id', $this->lembaga->id)->get();
            $array = [];
            if ($kelas) {
              foreach ($kelas as $kls) {
                array_push($array, $kls->id);
              }
            }
            $santris = Santri::whereIn('kelas_asrama_id', $array)->get();
            break;
          
        }
        return view('livewire.izin-sakit-santri.izin-sakit-santri-create', [
          'santris' => $santris
        ])->title('Tambah Izin Sakit Santri ' . $this->lembaga->nama);
    }
}
