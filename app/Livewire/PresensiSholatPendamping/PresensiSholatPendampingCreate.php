<?php

namespace App\Livewire\PresensiSholatPendamping;

use App\Models\User;
use App\Models\Lembaga;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\IzinKeluarPendamping;
use App\Models\IzinPulangPendamping;
use App\Jobs\StorePresensiSholatPendamping;

class PresensiSholatPendampingCreate extends Component
{
    public $lembaga;
    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
    }

    public function tambah()
    {
      $data = [
            'lembaga_id' => request()->lembaga_id,
            'user_id' => request()->user_id,
            'waktu' => request()->waktu,
            'keterangans' => request()->keterangans,
        ];

        dispatch(new StorePresensiSholatPendamping($data));

        session()->flash('success', 'Presensi Sholat Berhasil');
        return redirect( '/' . request()->lembaga_id .'/presensiSholatPendamping');
    }

    public function render()
    {
        return view('livewire.presensi-sholat-pendamping.presensi-sholat-pendamping-create', [
          'users' => User::role(['Pengurus', 'Pendamping'])->withoutRole('Ketua Asrama')->whereRelation('dataUser', 'jenis_kelamin', auth()->user()->dataUser->jenis_kelamin)->orderBy('name', 'asc')->get(),
          'izinKeluarUsers' => IzinKeluarPendamping::getIzinKeluarPendampingBerlaku(),
          'izinPulangUsers' => IzinPulangPendamping::getIzinPulangPendampingBerlaku(),
        ])->title('Tambah Presensi Sholat Pendamping ' . $this->lembaga->nama);
    }
}
