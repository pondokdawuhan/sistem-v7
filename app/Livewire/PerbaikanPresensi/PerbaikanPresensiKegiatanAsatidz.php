<?php

namespace App\Livewire\PerbaikanPresensi;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PoinPendamping;
use App\Models\PelanggaranPendamping;
use App\Models\PresensiKegiatanAsatidz;

class PerbaikanPresensiKegiatanAsatidz extends Component
{
    use WithPagination;

    public $page;
    public $paginate = 20;
    public $search;
    public $role;


    public $titleModal;
    public $santri_name;
    public $kegiatan;
    public $keterangan;
    public $presensi;

    public function mount()
    {
      $this->role = explode('/', request()->path())[0];
    }

    public function pilih($id)
    {
      $presensi = PresensiKegiatanAsatidz::find($id);
      $this->titleModal = 'Perbaikan Presensi Kegiatan ' . $presensi->user->name;
      $this->presensi = $presensi;
      $this->santri_name = $presensi->user->name;
      $this->kegiatan = $presensi->kegiatan;
      $this->keterangan = $presensi->keterangan;
    }


    public function ubah()
    {
      if ($this->presensi->lembaga->jenis_lembaga == 'ASRAMA') {
          if ($this->keterangan == 'A') {
            $kode = abs(mt_rand(10000, 999999));
            $this->presensi->update([
                'keterangan' => 'A',
                'pelanggaran_id' => $kode
            ]);

            $queryPoin = PoinPendamping::where('user_id', $this->presensi->user_id)->first();

            if ($queryPoin) {
                $queryPoin->update([
                    'poin_kegiatan' => $queryPoin->poin_kegiatan + 1
                ]);
            } else {
                PoinPendamping::create([
                    'user_id' => $this->presensi->user_id,
                    'poin_kegiatan' => 1
                ]);
            }


            PelanggaranPendamping::create([
                'referensi_poin_id' => 1,
                'user_id' => $this->presensi->user_id,
                'tanggal' => date('Y-m-d', time()),
                'keterangan' => 'Alpha Kegiatan ' . $this->presensi->kegiatan,
                'poin' => 1,
                'pelanggaran_id' => $kode
            ]);
        } else {
            // diupdate ke selain alpha namun asalnya alpha
            if ($this->presensi->keterangan == 'A') {
                $this->presensi->update([
                    'keterangan' => $this->keterangan
                ]);

                PelanggaranPendamping::where('pelanggaran_id', $this->presensi->pelanggaran_id)->first()->delete();

                $queryPoin = PoinPendamping::where('user_id', $this->presensi->user_id)->first();

                $queryPoin->update([
                    'poin_kegiatan' => $queryPoin->poin_kegiatan - 1
                ]);
            } else {
                $this->presensi->update([
                    'keterangan' => $this->keterangan
                ]);
            }
        }
      } else {
        $this->presensi->update([
                'keterangan' => $this->keterangan
        ]);
      }

      session()->flash('success', 'Perbaikan Presensi ' . $this->santri_name . ' berhasil');
    }


    public function delete($id)
    {
      $presensi = PresensiKegiatanAsatidz::find($id);

      if ($presensi->lembaga->jenis_lembaga == 'ASRAMA') {
        if ($presensi->keterangan == 'A') {

            PelanggaranPendamping::where('pelanggaran_id', $presensi->pelanggaran_id)->first()->delete();

            $queryPoin = PoinPendamping::where('user_id', $presensi->user_id)->first();

            $queryPoin->update([
                'poin_kegiatan' => $queryPoin->poin_kegiatan - 1
            ]);
        }

        $presensi->delete();

      } else {
        $presensi->delete();
      }

      session()->flash('success', 'Data berhasil dihapus');
    }

    public function render()
    {
        if ($this->search) {
          $presensis = PresensiKegiatanAsatidz::with('lembaga', 'user')->filter($this->search)->latest()->get();
          $this->page = 1;
        } else {
          $presensis = PresensiKegiatanAsatidz::with('lembaga', 'user')->latest()->paginate($this->paginate);
          $this->page = $presensis->firstItem();
        }
        return view('livewire.perbaikan-presensi.perbaikan-presensi-kegiatan-asatidz', [
          'presensis' => $presensis
        ]);
    }
}
