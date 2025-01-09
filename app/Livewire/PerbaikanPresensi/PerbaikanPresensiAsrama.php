<?php

namespace App\Livewire\PerbaikanPresensi;

use App\Models\Lembaga;
use Livewire\Component;
use App\Models\PoinSantri;
use Livewire\WithPagination;
use App\Models\PresensiAsrama;
use App\Models\PelanggaranSantri;

class PerbaikanPresensiAsrama extends Component
{

  use WithPagination;
    public $lembaga;
    public $paginate = 20;
    public $page;
    public $search;
    public $role;

    public $titleModal;
    public $presensiAsrama;
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
      $this->presensiAsrama = PresensiAsrama::find($id);
      $this->santri_name = $this->presensiAsrama->santri->name;
      $this->kegiatan = $this->presensiAsrama->kegiatan;
      $this->keterangan = $this->presensiAsrama->keterangan;

    }

    public function ubah()
    {
        // jika diubah menjadi alpha

        if ($this->keterangan == 'A') {
          $kode = abs(mt_rand(10000, 999999));
            $this->presensiAsrama->update([
                'keterangan' => 'A',
                'pelanggaran_id' => $kode
            ]);

            $queryPoin = PoinSantri::where('santri_id', $this->presensiAsrama->santri_id)->first();

            if ($queryPoin) {
                $queryPoin->update([
                    'poin_asrama' => $queryPoin->poin_asrama + 1
                ]);
            } else {
                PoinSantri::create([
                    'santri_id' => $this->presensiAsrama->santri_id,
                    'poin_asrama' => 1
                ]);
            }


            PelanggaranSantri::create([
                'lembaga_id' => $this->lembaga->id,
                'referensi_poin_id' => 1,
                'santri_id' => $this->presensiAsrama->santri_id,
                'tanggal' => date('Y-m-d', time()),
                'keterangan' => 'Alpha Kegiatan ' . $this->presensiAsrama->kegiatan . ' ' . $this->lembaga->nama,
                'poin' => 1,
                'user_id' => $this->presensiAsrama->user_id,
                'pelanggaran_id' => $kode
            ]);
        } else {
            // diupdate ke selain alpha namun asalnya alpha
            if ($this->presensiAsrama->keterangan == 'A') {
                $this->presensiAsrama->update([
                    'keterangan' => $this->keterangan
                ]);

                PelanggaranSantri::where('pelanggaran_id', $this->presensiAsrama->pelanggaran_id)->first()->delete();

                $queryPoin = PoinSantri::where('santri_id', $this->presensiAsrama->santri_id)->first();

                $queryPoin->update([
                    'poin_asrama' => $queryPoin->poin_asrama - 1
                ]);
            } else {
                $this->presensiAsrama->update([
                    'keterangan' => $this->keterangan
                ]);
            }
        }

        session()->flash('success', 'Perbaikan Presensi Asrama ' . $this->presensiAsrama->santri->name . ' berhasil');
        return $this->redirect('/'. $this->lembaga->id . '/' . $this->role .'/perbaikanPresensiAsrama', true);
    }

    public function delete($id)
    {
      $presensiAsrama = PresensiAsrama::find($id);
      if ($presensiAsrama->keterangan == 'A') {
            
            PelanggaranSantri::where('pelanggaran_id', $presensiAsrama->pelanggaran_id)->first()->delete();

            $queryPoin = PoinSantri::where('santri_id', $presensiAsrama->santri_id)->first();

            $queryPoin->update([
                'poin_asrama' => $queryPoin->poin_asrama - 1
            ]);
        }

        $presensiAsrama->delete();

        session()->flash('success', 'Data berhasil dihapus');

        return $this->redirect('/' . $this->lembaga->id . '/' . $this->role . '/perbaikanPresensiAsrama', true);
    }

    public function render()
    {
      if ($this->search) {
          $presensis = PresensiAsrama::where('lembaga_id', $this->lembaga->id)->filter($this->search)->latest()->get();
          $this->page = 1;
        } else {
          $presensis = PresensiAsrama::where('lembaga_id', $this->lembaga->id)->latest()->paginate($this->paginate);
          $this->page = $presensis->firstItem();
        }
        return view('livewire.perbaikan-presensi.perbaikan-presensi-asrama', [
          'presensis' => $presensis
        ])->title('Perbaikan Presensi Asrama ' . $this->lembaga->nama);
    }
}
