<?php

namespace App\Livewire\NilaiSantri;

use App\Models\Kelas;
use App\Models\Santri;
use App\Models\Lembaga;
use Livewire\Component;
use App\Models\Pelajaran;
use App\Models\NilaiSantri;
use App\Models\TahunAjaran;

class NilaiSantriList extends Component
{
    public $lembaga;
    public $selectedKelas;
    public $selectedPelajaran;
    public $selectedSemester;
    public $selectedTahun;
    public $nilais;
    public $santris;

    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
    }

    public function delete($id)
    {
      NilaiSantri::find($id)->delete();

      session()->flash('success', 'Data berhasil dihapus');
      return $this->redirect('/' . $this->lembaga->id . '/nilaiSantri', true);
    }
    public function pilih()
    {
          $this->santris = Santri::getSantriByKelas($this->selectedKelas, $this->lembaga->jenis_lembaga);
          $this->nilais = NilaiSantri::with('pelajaran', 'user', 'santri')->where('user_id', auth()->user()->id)->getNilaiByKelasPelajaran($this->santris, $this->selectedPelajaran, $this->selectedSemester, $this->selectedTahun)->get();
    }


    public function render()
    {

        return view('livewire.nilai-santri.nilai-santri-list', [
          'nilais' => $this->nilais,
          'santris' => $this->santris,
          'kelas' => Kelas::whereRelation('userMengajar', 'user_id', auth()->user()->id)->where('lembaga_id', $this->lembaga->id)->get(),
          'pelajarans' => Pelajaran::whereRelation('user', 'user_id', auth()->user()->id)->where('lembaga_id', $this->lembaga->id)->get(),
          'kelasName' => request('kelas') ?? null,
          'pelajaranName' => request('pelajaran') ?? null,
          'tahunAjaran' => TahunAjaran::first()
        ])->title('Nilai Santri ' . $this->lembaga->nama);
    }
}
