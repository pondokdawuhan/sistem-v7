<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas;
use App\Models\Santri;
use App\Models\Lembaga;
use Livewire\Component;
use Illuminate\Http\Request;

class KelasRombel extends Component
{
    public $lembaga;
    public $kelas;
    public $santris;
    public $rombel = [];
    public $deleteAnggotaRombel = [];
    public function mount(Lembaga $lembaga, Kelas $kelas)
    {
      $this->lembaga = $lembaga;
      $this->kelas = $kelas;
      
      switch ($lembaga->jenis_lembaga) {
            case 'FORMAL':
              $this->santris = Santri::where('kelas_formal_id', null)->get();
              break;
            case 'MADIN':
              $this->santris = Santri::where('kelas_madin_id', null)->get();
              break;
            case 'MMQ':
              $this->santris = Santri::where('kelas_mmq_id', null)->get();
              break;
            case 'ASRAMA':
              $this->santris = Santri::where('kelas_asrama_id', null)->get();
              break;
            
          }
    }
    
    public function render()
    {
        return view('livewire.kelas.kelas-rombel', [
          'kelas' => $this->kelas,
          'anggotaKelas' => Santri::getSantriByKelas($this->kelas->id, $this->lembaga->jenis_lembaga),
          'santris' => $this->santris
        ])->title('Data Rombel Kelas ' . $this->kelas->nama . ' ' . $this->lembaga->nama);
    }

    public function tambahRombel()
    {
      $santris = Santri::whereIn('id', $this->rombel)->get();

      
        switch ($this->lembaga->jenis_lembaga) {
          case 'FORMAL':
            if ($santris) {
              foreach ($santris as $santri) {
                $santri->update(['kelas_formal_id' => $this->kelas->id]);
              }
            }
            break;

          case 'MADIN':
            if ($santris) {
              foreach ($santris as $santri) {
                $santri->update(['kelas_madin_id' => $this->kelas->id]);
              }
            }
            break;
          

          case 'MMQ':
            if ($santris) {
              foreach ($santris as $santri) {
                $santri->update(['kelas_mmq_id' => $this->kelas->id]);
              }
            }
            break;

          case 'ASRAMA':
            if ($santris) {
              foreach ($santris as $santri) {
                $santri->update(['kelas_asrama_id' => $this->kelas->id]);
              }
            }
            break;
          
        }

        session()->flash('success', 'Data Rombel Kelas ' . $this->kelas->nama . ' berhasil diubah');
        return $this->redirect('/editRombel/' . $this->lembaga->id . '/' . $this->kelas->id, navigate:true);
    }

    public function destroyAnggotaRombel() 
    {
      $santris = Santri::whereIn('id', $this->deleteAnggotaRombel)->get();

        switch ($this->lembaga->jenis_lembaga) {
          case 'FORMAL':
            if ($santris) {
              foreach ($santris as $santri) {
                $santri->update(['kelas_formal_id' => null]);
              }
            }
            break;

          case 'MADIN':
            if ($santris) {
              foreach ($santris as $santri) {
                $santri->update(['kelas_madin_id' => null]);
              }
            }
            break;
          

          case 'MMQ':
            if ($santris) {
              foreach ($santris as $santri) {
                $santri->update(['kelas_mmq_id' => null]);
              }
            }
            break;

          case 'ASRAMA':
            if ($santris) {
              foreach ($santris as $santri) {
                $santri->update(['kelas_asrama_id' => null]);
              }
            }
            break;
          
        }
        
        session()->flash('success', 'Data Rombel Kelas ' . $this->kelas->nama . ' berhasil dihapus');
        return $this->redirect('/editRombel/' . $this->lembaga->id . '/' . $this->kelas->id, navigate:true);
    }

    public function resetAnggotaRombel() 
    {
        
        switch ($this->lembaga->jenis_lembaga) {
          case 'FORMAL':
            $santris = Santri::where('kelas_formal_id', $this->kelas->id)->get();
            if ($santris) {
              foreach ($santris as $santri) {
                $santri->update(['kelas_formal_id' => null]);
              }
            }
          break;

          case 'MADIN':
            $santris = Santri::where('kelas_madin_id', $this->kelas->id)->get();
            if ($santris) {
              foreach ($santris as $santri) {
                $santri->update(['kelas_madin_id' => null]);
              }
            }
          break;

          case 'MMQ':
            $santris = Santri::where('kelas_mmq_id', $this->kelas->id)->get();
            if ($santris) {
              foreach ($santris as $santri) {
                $santri->update(['kelas_mmq_id' => null]);
              }
            }
          break;

          case 'ASRAMA':
            $santris = Santri::where('kelas_asrama_id', $this->kelas->id)->get();
            if ($santris) {
              foreach ($santris as $santri) {
                $santri->update(['kelas_asrama_id' => null]);
              }
            }
          break;

        }
        
        session()->flash('success', 'Data Rombel Kelas ' . $this->kelas->nama . ' berhasil direset');
        return $this->redirect('/editRombel/' . $this->lembaga->id . '/' . $this->kelas->id, navigate:true);
    }
}
