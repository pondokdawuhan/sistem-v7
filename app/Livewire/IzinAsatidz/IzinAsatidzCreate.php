<?php

namespace App\Livewire\IzinAsatidz;

use App\Models\User;
use App\Models\Lembaga;
use Livewire\Component;
use App\Models\IzinAsatidz;
use App\Traits\WablasTrait;


class IzinAsatidzCreate extends Component
{ 
    public $lembaga;
    public $role;
    public $tanggal_mulai;
    public $keperluan;
    public $tugas;
    public $tanggal_selesai;
    
    
    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
      $this->role = 'guru';
    }

    public function tambah()
    {
      $data = $this->validate([
            'tanggal_mulai' => 'required',
            'keperluan' => 'required',
            'tugas' => 'required',
            'tanggal_selesai' => 'required'
        ]);

        $data['lembaga_id'] = $this->lembaga->id;
        $data['user_id'] = auth()->user()->id;

        IzinAsatidz::create($data);

       $message = "Assalamualaikum Wr.Wb. Ustadz/Ustadzah atas nama " . auth()->user()->name  .  " baru saja mengisi izin dengan keterangan " . $data['keperluan'] . ", silahkan cek di sistem, Terima kasih.";
     
        
        $notifikasis = User::whereRelation('dataUser', 'notifikasiKhusus', 'Kepala ' . $this->lembaga->nama)->orWhereRelation('dataUser', 'notifikasiKhusus', 'Kurikulum ' . $this->lembaga->nama)->get();
       
        foreach($notifikasis as $notifikasi) {
          $this->sendText($notifikasi->dataUser->no_hp, $message);
        }
        
        session()->flash('success', 'Data Izin berhasil ditambahkan');
        return $this->redirect('/' . $this->lembaga->id . '/guru/izinAsatidz', true);
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

    public function render()
    {
        return view('livewire.izin-asatidz.izin-asatidz-create')->title('Tambah Izin Asatidz ' . auth()->user()->name . ' ' . $this->lembaga->nama);
    }
}
