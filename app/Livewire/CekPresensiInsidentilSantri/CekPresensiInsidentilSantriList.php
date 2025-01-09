<?php

namespace App\Livewire\CekPresensiInsidentilSantri;

use App\Models\JurnalPresensiInsidentilSantri;
use App\Models\Kelas;
use App\Models\Lembaga;
use Livewire\Component;

class CekPresensiInsidentilSantriList extends Component
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
        $jurnals = JurnalPresensiInsidentilSantri::where('lembaga_id', $this->lembaga->id)->whereDate('created_at', date('Y-m-d', strtotime($this->selectedDate)))->get();
      } else {
        $jurnals = JurnalPresensiInsidentilSantri::where('lembaga_id', $this->lembaga->id)->whereDate('created_at', date('Y-m-d', time()))->get();
      }
        return view('livewire.cek-presensi-insidentil-santri.cek-presensi-insidentil-santri-list', [
          'jurnals' => $jurnals,
          'kelass' => Kelas::where('lembaga_id', $this->lembaga->id)->get()
        ])->title('Presensi Insidentil Santri ' . $this->lembaga->nama);
    }
}
