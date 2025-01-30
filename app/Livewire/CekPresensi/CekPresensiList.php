<?php

namespace App\Livewire\CekPresensi;

use App\Models\JadwalPelajaran;
use App\Models\Kelas;
use App\Models\Jurnal;
use App\Models\Lembaga;
use Livewire\Component;
use App\Models\Pelajaran;

class CekPresensiList extends Component
{
    public $lembaga;
    public $role;
    public $tanggal;

    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
      $this->tanggal = date('Y-m-d', time());
    }

    public function render()
    {
      
      $kelas = Kelas::where('lembaga_id', $this->lembaga->id)->get();
      if ($this->tanggal) {
        $jurnal = Jurnal::where('lembaga_id', $this->lembaga->id)->whereDate('created_at', $this->tanggal)->get();
      } else {
        $jurnal = Jurnal::where('lembaga_id', $this->lembaga->id)->whereDate('created_at', date('Y-m-d', time()))->get();
      }
      switch ($this->lembaga->jenis_lembaga) {
        case 'FORMAL':
          $indikator = 'kelas_formal_id';
          break;


        case 'MADIN':
          $indikator = 'kelas_madin_id';
         
          break;

        case 'MMQ':
          $indikator = 'kelas_mmq_id';
          
          break;
        
      }
      
        return view('livewire.cek-presensi.cek-presensi-list', [
        'title' => 'Cek Presensi ' . $this->lembaga->nama,
        'kelas' => $kelas,
        'jurnals' => $jurnal ?? null,
        'pelajaran' => Pelajaran::where('lembaga_id', $this->lembaga->id)->get(),
        'indikator_kelas' => $indikator,
        'jam' => $this->lembaga->jam + 1,
        'jadwalPelajarans' => JadwalPelajaran::with('user', 'pelajaran')->where('lembaga_id', $this->lembaga->id)->where('hari', getHari($this->tanggal))->get()
      ])->title('Cek Presensi ' . $this->lembaga->nama);
    }
}
