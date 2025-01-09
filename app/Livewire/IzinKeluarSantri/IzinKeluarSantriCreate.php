<?php

namespace App\Livewire\IzinKeluarSantri;

use App\Models\Kelas;
use App\Models\Santri;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\IzinKeluarSantri;
use App\Models\Lembaga;

class IzinKeluarSantriCreate extends Component
{
    #[Title('Tambah Izin Keluar Santri')]
    public $role;
    public $lembaga;
    public $userId = [];
    public $waktu_mulai;
    public $waktu_selesai;
    public $keperluan;

    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
    }


    public function tambah()
    {
      $data = $this->validate([
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'keperluan' => 'required'
        ]);

        $data['user_id'] = auth()->user()->id;
        $data['lembaga_id'] = $this->lembaga->id;

        foreach ($this->userId as $userId) {
            $data['santri_id'] = $userId;
            IzinKeluarSantri::create($data);
        }

        session()->flash('success', 'Izin Santri Berhasil ditambahkan');
        return $this->redirect('/' . $this->lembaga->id .  '/' . $this->role . '/izinKeluarSantri', true);
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
            $santris = Santri::with('dataSantri')->whereIn('kelas_asrama_id', $array)->get();
            break;
          default:
            if ($this->role == 'kesiswaan') {
              $klss = 'kelas_formal_id';
            } else {
              $klss = 'kelas_asrama_id';
            }
            $kelas = Kelas::where('lembaga_id', $this->lembaga->id)->get();
            $array = [];
            if ($kelas) {
              foreach ($kelas as $kls) {
                array_push($array, $kls->id);
              }
            }
            $santris = Santri::with('dataSantri')->whereIn($klss, $array)->get();
            break;
        }
        return view('livewire.izin-keluar-santri.izin-keluar-santri-create', [
          'santris' => $santris
        ]);
    }
}
