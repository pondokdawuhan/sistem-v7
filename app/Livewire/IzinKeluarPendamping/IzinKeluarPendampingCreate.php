<?php

namespace App\Livewire\IzinKeluarPendamping;

use App\Models\User;
use Livewire\Component;
use App\Traits\WablasTrait;
use Livewire\Attributes\Title;
use App\Models\IzinKeluarPendamping;
use Psy\CodeCleaner\AssignThisVariablePass;

class IzinKeluarPendampingCreate extends Component
{
    #[Title('Tambah Izin Keluar Pendamping')]

    public $role;
    public $waktu_mulai;
    public $waktu_selesai;
    public $keperluan;

    public function mount()
    {
      $this->role = explode('/', request()->path())[0];
    }

    public function tambah()
    {
      
      $data = $this->validate([
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'keperluan' => 'required'
        ]);

        $data['user_id'] = auth()->user()->id;

        IzinKeluarPendamping::create($data);

        $message = "Assalamualaikum Wr.Wb. Pendamping atas nama " . auth()->user()->name  .  " baru saja mengisi izin keluar dengan keterangan " . $data['keperluan'] . ", silahkan cek di sistem, Terima kasih.";
        if (auth()->user()->dataUser->jenis_kelamin == 'Laki-laki') {
          $jk = 'Putra';
        } elseif (auth()->user()->dataUser->jenis_kelamin == 'Perempuan') {
          $jk = 'Putri';
        }
        
        $notifikasi = User::whereRelation('dataUser', 'notifikasiKhusus', 'Ketua Asrama ' . $jk )->first();
        
            if ($notifikasi) {
              $kumpulan_data = [];
              $data['phone'] = $notifikasi->dataUser->no_hp;
              $data['message'] = $message;
              $data['secret'] = false;
              $data['retry'] = false;
              $data['isGroup'] = false;

              array_push($kumpulan_data, $data);
              WablasTrait::sendText($kumpulan_data);
            }
        session()->flash('success', 'Izin berhasil ditambahkan');
        return $this->redirect('/'. $this->role .'/izinKeluarPendamping', true);
    }

    public function render()
    {
        return view('livewire.izin-keluar-pendamping.izin-keluar-pendamping-create');
    }
}
