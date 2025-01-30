<?php

namespace App\Livewire\IzinPulangSantri;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Santri;
use Livewire\Component;
use App\Traits\WablasTrait;
use Livewire\Attributes\Title;
use App\Models\IzinPulangSantri;
use App\Models\Lembaga;

class IzinPulangSantriCreate extends Component
{
    
    #[Title('Tambah Izin Pulang Santri')]

    public $role;
    public $lembaga;
    public $userId;
    public $waktu_mulai;
    public $waktu_selesai;
    public $keperluan;

    public function mount(Lembaga $lembaga)
    {
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

            IzinPulangSantri::create($data);
        }

        $santris = Santri::whereIn('id', $this->userId)->get();
        
        $kumpulanSantri = '';
        foreach ($santris as $santri) {
          $kumpulanSantri .= $santri->name . '<br>';
        }
        
        $message = "Assalamualaikum Wr.Wb. Santri atas nama" . "<br>" . $kumpulanSantri . "<br>" . "baru saja mengisi izin pulang dengan keterangan " . $data['keperluan'] . ", silahkan cek di sistem, Terima kasih.";

        if ( $santris[0]->dataSantri->jenis_kelamin == 'Laki-laki') {
          $jk = 'Putra';
        } elseif ($santris[0]->dataSantri->jenis_kelamin  == 'Perempuan') {
          $jk = 'Putri';
        }

        $notifikasis = User::whereRelation('dataUser', 'notifikasiKhusus', 'Pengasuh')->orWhereRelation('dataUser', 'notifikasiKhusus', 'Ketua Asrama ' . $jk )->get();
       
        foreach($notifikasis as $notifikasi) {
          $this->sendText($notifikasi->dataUser->no_hp, $message);
        }
        
        session()->flash('success', 'Izin Pulang berhasil ditambah');
        return $this->redirect('/' . $this->lembaga->id . '/' . $this->role . '/izinPulangSantri', true);
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
          case 'pengurus':
            $kelas = Kelas::where('lembaga_id', $this->lembaga->id)->get();
            $array = [];
            if ($kelas) {
              foreach ($kelas as $kls) {
                array_push($array, $kls->id);
              }
            }
            $santris = Santri::with('dataSantri')->whereIn('kelas_asrama_id', $array)->get();
            break;
        }
        return view('livewire.izin-pulang-santri.izin-pulang-santri-create', [
          'santris' => $santris
        ]);
    }
}
