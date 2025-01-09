<?php

namespace App\Livewire\Presensi;

use App\Models\Kelas;
use App\Models\Jurnal;
use App\Models\Santri;
use App\Models\Lembaga;
use Livewire\Component;
use App\Models\Pelajaran;
use App\Jobs\StorePresensi;
use Illuminate\Http\Request;
use App\Models\IzinSakitSantri;
use App\Models\IzinKeluarSantri;
use App\Models\IzinPulangSantri;

class PresensiCreate extends Component
{
    
    public $lembaga;
    public $selectedKelas;
    public $selectedPelajaran;
    public $selectedJam = [];
    public $materi;
    public $santris;
    public $request;
    public $keterangans = [];
    public $selectedKeterangans = [];
    public $is_guru_piket;
    public $role;
   

    public function mount(Lembaga $lembaga)
    {
      $this->role = explode('/', request()->path())[1];
      if ($this->role == 'guruPiket') {
        $this->is_guru_piket = true;
      } else {
        $this->is_guru_piket = false;
      }

      $this->lembaga = $lembaga;
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
      }
    } 


    public function tambah(Request $request)
    {
      $lembaga = Lembaga::find($request->lembaga);
      foreach ($request->jam as $jam) {
            $ktr = 'keterangans' . $jam;
            $data = [
                'jam' => $jam,
                'lembaga_id' => $lembaga->id,
                'pelajaran_id' => $request->pelajaran_id,
                'kelas_id' => $request->kelas_id,
                'santri_id' => $request->santri_id,
                'keterangans' => $request->$ktr,
                'user_id' => auth()->user()->id,
                'is_guru_piket' => $request->is_guru_piket ?? 0
            ];

            dispatch(new StorePresensi($data));
            
            Jurnal::create([
                'lembaga_id' => $lembaga->id,
                'user_id' => auth()->user()->id,
                'pelajaran_id' => $request->pelajaran_id,
                'kelas_id' => $request->kelas_id,
                'jam' => $jam,
                'materi' => $request->materi,
                'is_guru_piket' => $request->is_guru_piket ?? 0
            ]);
        }

        session()->flash('success', 'Presensi berhasil');
        return redirect('/jurnal');
    }
    

    public function render()
    {
        if ($this->is_guru_piket == true) {
          $kelass = Kelas::where('lembaga_id', $this->lembaga->id)->get();
          $pelajarans = Pelajaran::where('lembaga_id', $this->lembaga->id)->get();
        } else {
          $kelass = Kelas::where('lembaga_id', $this->lembaga->id)->whereRelation('userMengajar', 'user_id', auth()->user()->id)->get();
          $pelajarans = Pelajaran::where('lembaga_id', $this->lembaga->id)->whereRelation('user', 'user_id', auth()->user()->id)->get();
        }
        return view('livewire.presensi.presensi-create', [
            'pelajarans' => $pelajarans,
            'kelass' => $kelass,
            'jams' => $this->lembaga->jam + 1,
            'santris' => $this->santris,
            'izinKeluarSantris' => IzinKeluarSantri::getIzinKeluarSantriBerlaku(),
            'izinPulangSantris' => IzinPulangSantri::getIzinPulangSantriBerlaku(),
            'izinSakitSantris' => IzinSakitSantri::getIzinSakitSantriBerlaku(),
        ])->title('Tambah Presensi ' . $this->lembaga->nama);
    }
}
