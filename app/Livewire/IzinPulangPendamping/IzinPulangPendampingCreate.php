<?php

namespace App\Livewire\IzinPulangPendamping;

use App\Models\User;
use Livewire\Component;
use App\Traits\WablasTrait;
use App\Models\IzinPulangPendamping;

class IzinPulangPendampingCreate extends Component
{
    public $role;
    public $waktu_mulai;
    public $waktu_selesai;
    public $keperluan;

    
    public function tambah()
    {
      $data = $this->validate([
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'keperluan' => 'required'
        ]);

        $data['user_id'] = auth()->user()->id;

        IzinPulangPendamping::create($data);

        $notifikasis = User::whereRelation('dataUser', 'notifikasiKhusus', 'Pengasuh')->get();

        $message = "Assalamualaikum Wr.Wb. Pendamping atas nama " . auth()->user()->name . " baru saja mengisi izin pulang dengan keterangan " . $data['keperluan'] . ", silahkan cek di sistem, Terima kasih.";
        
        if ( auth()->user()->dataUser->jenis_kelamin == 'Laki-laki') {
          $jk = 'Putra';
        } elseif (auth()->user()->dataUser->jenis_kelamin  == 'Perempuan') {
          $jk = 'Putri';
        }

        $notifikasis = User::whereRelation('dataUser', 'notifikasiKhusus', 'Pengasuh')->orWhereRelation('dataUser', 'notifikasiKhusus', 'Ketua Asrama ' . $jk )->get();
       
        foreach($notifikasis as $notifikasi) {
          $this->sendText($notifikasi->dataUser->no_hp, $message);
        }

        session()->flash('success', 'Data Izin berhasil ditambahkan');
        return $this->redirect('/'. $this->role .'/izinPulangPendamping', true);
    }

    protected function sendText($noHp, $message)
    {
      $kumpulan_data = [];
      $data['phone'] = $noHp;
      $data['message'] = $message;
      $data['secret'] = false;
      $data['retry'] = false;
      $data['isGroup'] = false;

      array_push($kumpulan_data, $data);
      WablasTrait::sendText($kumpulan_data);
    }


    public function mount()
    {
      $this->role = explode('/', request()->path())[0];
    }
    public function render()
    {
        return view('livewire.izin-pulang-pendamping.izin-pulang-pendamping-create')->title('Tambah Izin Pulang ' . auth()->user()->name);
    }
}
