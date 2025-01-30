<?php

namespace App\Livewire\PresensiKegiatanAsatidz;

use App\Models\User;
use App\Models\Lembaga;
use Livewire\Component;
use App\Models\IzinAsatidz;
use App\Models\IzinKeluarPendamping;
use App\Models\IzinPulangPendamping;
use Illuminate\Database\Eloquent\Builder;
use App\Jobs\StorePresensiKegiatanAsatidz;

class PresensiKegiatanAsatidzCreate extends Component
{
    public $lembaga;
    public $role;

    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
    }

    public function tambah()
    {
      $data = [
            'user_id' => request()->user_id,
            'lembaga_id' => request()->lembaga,
            'role' => request()->role,
            'kegiatan' => request()->kegiatan,
            'keterangans' => request()->keterangans,
        ];

        dispatch(new StorePresensiKegiatanAsatidz($data));

        session()->flash('success', 'Presensi Kegiatan Asatidz berhasil');
        return redirect('/'. request('lembaga') . '/' . request('role') .'/presensiKegiatanAsatidz');
    }

    public function render()
    {
        if ($this->lembaga->jenis_lembaga == 'ASRAMA') {
          $users = User::with('dataUser')->whereRelation('lembaga', 'nama', $this->lembaga->nama)->role(['Pengurus', 'Pendamping'])->withoutRole('Ketua Asrama')->whereRelation('dataUser', 'jenis_kelamin', auth()->user()->dataUser->jenis_kelamin)->orderBy('name', 'asc')->get();
          
        } else {
          $users = User::with('dataUser')->whereRelation('lembaga', 'nama', $this->lembaga->nama)->orderBy('name', 'asc')->get();
        }
        return view('livewire.presensi-kegiatan-asatidz.presensi-kegiatan-asatidz-create', [
          'users' => $users,
          'izinKeluarUsers' => IzinKeluarPendamping::getIzinKeluarPendampingBerlaku(),
          'izinPulangUsers' => IzinPulangPendamping::getIzinPulangPendampingBerlaku(),
          'izinAsatidz' => IzinAsatidz::getIzinBerlaku()
        ])->title('Tambah Presensi Kegiatan Asatidz ' . $this->lembaga->nama);
    }
}
