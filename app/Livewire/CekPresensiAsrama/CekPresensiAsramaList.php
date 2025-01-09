<?php

namespace App\Livewire\CekPresensiAsrama;

use App\Models\JurnalPresensiAsrama;
use App\Models\Kelas;
use App\Models\Lembaga;
use Livewire\Component;

class CekPresensiAsramaList extends Component
{

  public $lembaga;
  public $selectedDate;
  
  public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
      $this->selectedDate = date('Y-m-d', time());
    }
    
    public function render()
    {
      if ($this->selectedDate) {
        $jurnals = JurnalPresensiAsrama::where('lembaga_id', $this->lembaga->id)->whereDate('created_at', date('Y-m-d', strtotime($this->selectedDate)))->get();
      } else {
        $jurnals = JurnalPresensiAsrama::where('lembaga_id', $this->lembaga->id)->whereDate('created_at', date('Y-m-d', time()))->get();
      }
        
        return view('livewire.cek-presensi-asrama.cek-presensi-asrama-list', [
          'jurnals' => $jurnals,
          'kelass' => Kelas::where('lembaga_id', $this->lembaga->id)->get()
        ])->title('Cek Pelaksanaan Presensi ' . $this->lembaga->nama);
    }
}
