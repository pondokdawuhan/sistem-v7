<?php

namespace App\Livewire\CekPresensi;

use App\Models\Kelas;
use App\Models\Lembaga;
use Livewire\Component;
use App\Models\JurnalSholatSantri;

class CekPresensiSholatSantriList extends Component
{
  public $selectedDate;
  public $role;
  public $lembaga;

    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
      $this->selectedDate = date('Y-m-d', time());
    }

    public function render()
    {
      
      if ($this->selectedDate) {
        $jurnals = JurnalSholatSantri::where('lembaga_id', $this->lembaga->id)->whereDate('created_at', date('Y-m-d', strtotime($this->selectedDate)))->get();
      } else {
        $jurnals = JurnalSholatSantri::where('lembaga_id', $this->lembaga->id)->whereDate('created_at', date('Y-m-d', time()))->get();
      }
        return view('livewire.cek-presensi.cek-presensi-sholat-santri-list', [
          'jurnals' => $jurnals,
          'kelass' => Kelas::where('lembaga_id', $this->lembaga->id)->get(),
        ])->title('Presensi Sholat ' . $this->lembaga->nama);
    }
}
