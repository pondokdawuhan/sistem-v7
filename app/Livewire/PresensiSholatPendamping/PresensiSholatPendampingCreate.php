<?php

namespace App\Livewire\PresensiSholatPendamping;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\IzinKeluarPendamping;
use App\Models\IzinPulangPendamping;
use App\Jobs\StorePresensiSholatPendamping;

class PresensiSholatPendampingCreate extends Component
{
    #[Title('Tambah Presensi Sholat Pendamping')]

    public function tambah()
    {
      $data = [
            'user_id' => request()->user_id,
            'waktu' => request()->waktu,
            'keterangans' => request()->keterangans,
        ];

        dispatch(new StorePresensiSholatPendamping($data));

        session()->flash('success', 'Presensi Sholat Berhasil');
        return redirect('/presensiSholatPendamping');
    }

    public function render()
    {
        return view('livewire.presensi-sholat-pendamping.presensi-sholat-pendamping-create', [
          'users' => User::role(['Pengurus', 'Pendamping'])->withoutRole('Ketua Asrama')->whereRelation('dataUser', 'jenis_kelamin', auth()->user()->dataUser->jenis_kelamin)->orderBy('name', 'asc')->get(),
          'izinKeluarUsers' => IzinKeluarPendamping::getIzinKeluarPendampingBerlaku(),
          'izinPulangUsers' => IzinPulangPendamping::getIzinPulangPendampingBerlaku(),
        ]);
    }
}
