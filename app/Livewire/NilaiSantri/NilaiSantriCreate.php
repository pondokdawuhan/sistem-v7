<?php

namespace App\Livewire\NilaiSantri;

use App\Models\Kelas;
use App\Models\Santri;
use App\Models\Lembaga;
use Livewire\Component;
use App\Models\Pelajaran;
use App\Models\NilaiSantri;

class NilaiSantriCreate extends Component
{
    public $lembaga;
    public $selectedKelas;
    public $selectedPelajaran;
    public $selectedSemester;
    public $selectedTahun;

    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
      $this->selectedKelas = request('kelas');
      $this->selectedPelajaran = request('pelajaran');
      $this->selectedSemester = request('semester');
      $this->selectedTahun = request('tahun');
    }

    public function tambah()
    {
      $data = request()->validate([
          'santri_id' => 'required',
          'pelajaran' => 'required',
          'lembaga' => 'required',
          'uh1' => 'nullable',
          'uh2' => 'nullable',
          'uh3' => 'nullable',
          'uh4' => 'nullable',
          'uh5' => 'nullable',
          'pts' => 'nullable',
          'pas' => 'nullable',
          'semester' => 'required',
          'tahun' => 'required',
        ]);
        
        $lembaga = Lembaga::find($data['lembaga']);
        $pelajaran = Pelajaran::find($data['pelajaran']);
        
        $tambah = 0;
        $ubah = 0;
        for ($i=0; $i < count($data['santri_id']); $i++) { 
          
          if ($data['uh1'][$i] == null && $data['uh2'][$i] == null && $data['uh3'][$i] == null && $data['uh4'][$i] == null && $data['uh5'][$i] == null && $data['pts'][$i] == null && $data['pas'][$i] == null) {
            
          } else {
            $nilaiSantri = NilaiSantri::where('lembaga_id', $lembaga->id)->where('user_id', auth()->user()->id)->where('santri_id', $data['santri_id'][$i])->where('pelajaran_id', $pelajaran->id)->where('semester', $data['semester'])->where('tahun', $data['tahun'])->first();
            if ($nilaiSantri) {
              $nilaiSantri->update([
                'uh1' => $data['uh1'][$i] ?? 0,
                'uh2' => $data['uh2'][$i] ?? 0,
                'uh3' => $data['uh3'][$i] ?? 0,
                'uh4' => $data['uh4'][$i] ?? 0,
                'uh5' => $data['uh5'][$i] ?? 0,
                'pts' => $data['pts'][$i] ?? 0,
                'pas' => $data['pas'][$i] ?? 0,
              ]);
              $ubah += 1;
            }
            else {
              NilaiSantri::create([
                'lembaga_id' => $lembaga->id,
                'santri_id' => $data['santri_id'][$i],
                'user_id' => auth()->user()->id,
                'pelajaran_id' => $pelajaran->id,
                'semester' => $data['semester'],
                'uh1' => $data['uh1'][$i] ?? 0,
                'uh2' => $data['uh2'][$i] ?? 0,
                'uh3' => $data['uh3'][$i] ?? 0,
                'uh4' => $data['uh4'][$i] ?? 0,
                'uh5' => $data['uh5'][$i] ?? 0,
                'pts' => $data['pts'][$i] ?? 0,
                'pas' => $data['pas'][$i] ?? 0,
                'tahun' => $data['tahun']
              ]);
              $tambah += 1;
            }
          }
        }

        return redirect('/' . $lembaga->id . '/nilaiSantri')->with('success', 'Nilai berhasil ditambahkan sebanyak ' . $tambah .' data dan diubah sebanyak ' . $ubah . ' data');
    }



    public function render()
    {
        if ($this->selectedKelas && $this->selectedPelajaran) {
          $santris = Santri::getSantriByKelas(request('kelas'), $this->lembaga->jenis_lembaga);
        } else {
          $santris = null;
        }

        return view('livewire.nilai-santri.nilai-santri-create', [
          'santris' => $santris,
          'kelas' => Kelas::find(request('kelas')),
          'pelajaran' => Pelajaran::find($this->selectedPelajaran),
          'semester' => $this->selectedSemester,
          'tahun' => $this->selectedTahun,
          'nilais' => NilaiSantri::with('pelajaran', 'user', 'santri')->where('lembaga_id', $this->lembaga->id)->where('user_id', auth()->user()->id)->getNilaiByKelasPelajaran($santris, $this->selectedPelajaran, $this->selectedSemester, $this->selectedTahun)->get()
        ])->title('Tambah Nilai Santri ' . $this->lembaga->nama);
    }
}
