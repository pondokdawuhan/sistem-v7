<?php

namespace App\Livewire\HafalanSantri;

use App\Models\Kelas;
use App\Models\Santri;
use App\Models\Lembaga;
use Livewire\Component;
use App\Models\HafalanSantri;

class HafalanSantriCreate extends Component
{
    public $lembaga;
    public $selectedKelas;
    public $kelass;
    public $santris;
    public $tanggal;

    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
      $this->kelass = Kelas::where('lembaga_id', $this->lembaga->id)->whereRelation('userMengajar', 'user_id', auth()->user()->id)->get();
    }

    public function pilih()
    {
      switch ($this->lembaga->jenis_lembaga) {
            case 'FORMAL':
              $this->santris = Santri::where('kelas_formal_id', $this->selectedKelas)->orderBy('name', 'asc')->get();
              break;
            case 'MADIN':
              $this->santris = Santri::where('kelas_madin_id', $this->selectedKelas)->orderBy('name', 'asc')->get();
              break;
            case 'MMQ':
              $this->santris = Santri::where('kelas_mmq_id', $this->selectedKelas)->orderBy('name', 'asc')->get();
              break;
            case 'ASRAMA':
              $this->santris = Santri::where('kelas_asrama_id', $this->selectedKelas)->orderBy('name', 'asc')->get();
              break;
            
    }
    }

    public function tambah()
    {
      for ($i=0; $i < count(request()->keterangan); $i++) { 
          if (request()->keterangan[$i]) {
            HafalanSantri::create([
              'lembaga_id' => request()->lembaga_id,
              'santri_id' => request()->santri_id[$i],
              'tanggal' => request()->tanggal,
              'user_id' => auth()->user()->id,
              'keterangan' => request()->keterangan[$i]
            ]);
          }
        }

        return redirect('/' . request('lembaga_id') . '/hafalanSantri')->with('success', 'Data Hafalan berhasil ditambahkan');
    }

    public function render()
    {

        return view('livewire.hafalan-santri.hafalan-santri-create', [
          'kelass' => $this->kelass,
          'santris' => $this->santris
        ])->title('Tambah Hafalan Santri ' . $this->lembaga->nama);
    }
}
