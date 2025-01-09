<?php

namespace App\Livewire\PerbaikanPresensiInsidentilSantri;

use App\Models\Lembaga;
use Livewire\Component;
use App\Models\PoinSantri;
use Livewire\WithPagination;
use App\Models\PelanggaranSantri;
use App\Models\PresensiInsidentilSantri;
use tidy;

class PerbaikanPresensiInsidentilSantriList extends Component
{
    use WithPagination;
    public $lembaga;
    public $paginate = 20;
    public $page;
    public $search;
    public $role;

    public $titleModal;
    public $presensiInsidentil;
    public $santri_name;
    public $kegiatan;
    public $keterangan;


    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
    }

    
    public function pilih($id)
    {
      $this->titleModal = 'Perbaikan Presensi Insidentil Santri';
      $this->presensiInsidentil = PresensiInsidentilSantri::find($id);
      $this->santri_name = $this->presensiInsidentil->santri->name;
      $this->kegiatan = $this->presensiInsidentil->kegiatan;
      $this->keterangan = $this->presensiInsidentil->keterangan;

    }

    public function ubah()
    {
        // jika diubah menjadi alpha

        if ($this->keterangan == 'A') {
          $kode = abs(mt_rand(10000, 999999));
            $this->presensiInsidentil->update([
                'keterangan' => 'A',
                'pelanggaran_id' => $kode
            ]);

            $queryPoin = PoinSantri::where('santri_id', $this->presensiInsidentil->santri_id)->first();

            if ($queryPoin) {
                $queryPoin->update([
                    'poin_pelanggaran' => $queryPoin->poin_pelanggaran + 1
                ]);
            } else {
                PoinSantri::create([
                    'santri_id' => $this->presensiInsidentil->santri_id,
                    'poin_pelanggaran' => 1
                ]);
            }


            PelanggaranSantri::create([
                'lembaga_id' => $this->lembaga->id,
                'referensi_poin_id' => 1,
                'santri_id' => $this->presensiInsidentil->santri_id,
                'tanggal' => date('Y-m-d', time()),
                'keterangan' => 'Alpha Kegiatan ' . $this->presensiInsidentil->kegiatan . ' ' . $this->lembaga->nama,
                'poin' => 1,
                'user_id' => $this->presensiInsidentil->user_id,
                'pelanggaran_id' => $kode
            ]);
        } else {
            // diupdate ke selain alpha namun asalnya alpha
            if ($this->presensiInsidentil->keterangan == 'A') {
                $this->presensiInsidentil->update([
                    'keterangan' => $this->keterangan
                ]);

                PelanggaranSantri::where('pelanggaran_id', $this->presensiInsidentil->pelanggaran_id)->first()->delete();

                $queryPoin = PoinSantri::where('santri_id', $this->presensiInsidentil->santri_id)->first();

                $queryPoin->update([
                    'poin_pelanggaran' => $queryPoin->poin_pelanggaran - 1
                ]);
            } else {
                $this->presensiInsidentil->update([
                    'keterangan' => $this->keterangan
                ]);
            }
        }

        session()->flash('success', 'Perbaikan Presensi Insidentil ' . $this->presensiInsidentil->santri->name . ' berhasil');
        return $this->redirect('/'. $this->lembaga->id . '/' . $this->role .'/perbaikanPresensiInsidentilSantri', true);
    }

    public function delete($id)
    {
      $presensiInsidentil = PresensiInsidentilSantri::find($id);
      if ($presensiInsidentil->keterangan == 'A') {
            
            PelanggaranSantri::where('pelanggaran_id', $presensiInsidentil->pelanggaran_id)->first()->delete();

            $queryPoin = PoinSantri::where('santri_id', $presensiInsidentil->santri_id)->first();

            $queryPoin->update([
                'poin_pelanggaran' => $queryPoin->poin_pelanggaran - 1
            ]);
        }

        $presensiInsidentil->delete();

        session()->flash('success', 'Data berhasil dihapus');

        return $this->redirect('/' . $this->lembaga->id . '/' . $this->role . '/perbaikanPresensiInsidentilSantri', true);
    }


    public function render()
    {
        if ($this->search) {
          $presensis = PresensiInsidentilSantri::where('lembaga_id', $this->lembaga->id)->filter($this->search)->latest()->get();
          $this->page = 1;
        } else {
          $presensis = PresensiInsidentilSantri::where('lembaga_id', $this->lembaga->id)->latest()->paginate($this->paginate);
          $this->page = $presensis->firstItem();
        }
        return view('livewire.perbaikan-presensi-insidentil-santri.perbaikan-presensi-insidentil-santri-list', [
          'presensis' => $presensis
        ])->title('Perbaikan Presensi Insidentil Santri ' . $this->lembaga->nama);
    }
}
