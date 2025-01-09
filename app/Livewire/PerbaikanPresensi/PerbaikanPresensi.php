<?php

namespace App\Livewire\PerbaikanPresensi;

use App\Models\Lembaga;
use Livewire\Component;
use App\Models\Presensi;
use App\Models\PoinSantri;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use App\Models\PelanggaranSantri;

class PerbaikanPresensi extends Component
{

    use WithPagination;

    public $lembaga;
    public $page; 
    public $paginate = 20;
    public $search;
    public $role;


    public $titleModal;
    public $presensi;
    public $santri_name;
    public $pelajaran;
    public $jam;
    public $keterangan;

    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
    }

    public function pilih($id)
    {
      $this->presensi = Presensi::find($id);
      $this->titleModal = 'Perbaikan Presensi ' . $this->presensi->santri->name;
      $this->santri_name = $this->presensi->santri->name;
      $this->pelajaran = $this->presensi->pelajaran->nama;
      $this->jam = $this->presensi->jam;
      $this->keterangan = $this->presensi->keterangan;
    }

    public function ubah()
    {
      
        switch ($this->lembaga->jenis_lembaga) {
            case 'FORMAL':
                $modelPoin = 'poin_formal';
                break;
            case 'MADIN':
                $modelPoin = 'poin_madin';
                break;
            case 'MMQ':
                $modelPoin = 'poin_mmq';
                break;
        }

        // jika diubah menjadi alpha

        if ($this->keterangan == 'A') {
            $kode = abs(mt_rand(10000, 999999));
            $this->presensi->update([
                'keterangan' => 'A',
                'pelanggaran_id' => $kode
            ]);

            $queryPoin = PoinSantri::where('santri_id', $this->presensi->santri_id)->first();

            if ($queryPoin) {
                $queryPoin->update([
                    $modelPoin => $queryPoin->$modelPoin + 1
                ]);
            } else {
                PoinSantri::create([
                    'santri_id' => $this->presensi->santri_id,
                    $modelPoin => 1
                ]);
            }

            PelanggaranSantri::create([
              'lembaga_id' => $this->lembaga->id,
                'referensi_poin_id' => 1,
                'santri_id' => $this->presensi->santri_id,
                'tanggal' => date('Y-m-d', time()),
                'keterangan' => 'Alpha Pelajaran ' . $this->presensi->pelajaran->nama . ' jam ke ' . $this->presensi->jam,
                'poin' => 1,
                'user_id' => $this->presensi->user_id,
                'pelanggaran_id' => $kode
            ]);
        } else {
            // diupdate ke selain alpha namun asalnya alpha
            if ($this->presensi->keterangan == 'A') {
                $this->presensi->update([
                    'keterangan' => $this->keterangan
                ]);

                PelanggaranSantri::where('pelanggaran_id', $this->presensi->pelanggaran_id)->first()->delete();

                $queryPoin = PoinSantri::where('santri_id', $this->presensi->santri_id)->first();

                $queryPoin->update([
                    $modelPoin => $queryPoin->$modelPoin - 1
                ]);
            } else {
                $this->presensi->update([
                    'keterangan' => $this->keterangan
                ]);
            }
        }

        
        session()->flash('success', 'Perbaikan Presensi ' . $this->presensi->santri->name . ' berhasil');
        return $this->redirect('/' . $this->lembaga->id . '/' . $this->role . '/perbaikanPresensi', true);
    }

    public function delete($id)
    {
      $presensi = Presensi::find($id);
        if ($presensi->keterangan == 'A') {
            PelanggaranSantri::where('pelanggaran_id', $presensi->pelanggaran_id)->first()->delete();

            $queryPoin = PoinSantri::where('santri_id', $presensi->santri_id)->first();

            switch ($this->lembaga->jenis_lembaga) {
            case 'FORMAL':
                $modelPoin = 'poin_formal';
                break;
            case 'MADIN':
                $modelPoin = 'poin_madin';
                break;
            case 'MMQ':
                $modelPoin = 'poin_mmq';
                break;
        }

            $queryPoin->update([
                $modelPoin => $queryPoin->$modelPoin - 1
            ]);
        }

        $presensi->delete();

        session()->flash('success', 'Presensi berhasil dihapus');
        return $this->redirect('/' . $this->lembaga->id . '/'. $this->role . '/perbaikanPresensi', true);
    }


    public function render()
    {
        if ($this->search) {
          $this->page = 1;
         $presensis = Presensi::with('lembaga', 'user', 'santri', 'kelas', 'pelajaran')->where('lembaga_id', $this->lembaga->id)->filter($this->search)->latest()->get();
        } else {
          $presensis = Presensi::with('lembaga', 'user', 'santri', 'kelas', 'pelajaran')->where('lembaga_id', $this->lembaga->id)->latest()->paginate($this->paginate);
        }
        return view('livewire.perbaikan-presensi.perbaikan-presensi', [
          'presensis' => $presensis
        ])->title('Perbaikan Presensi ' . $this->lembaga->nama);
    }
}
