<?php

namespace App\Livewire\PerbaikanPresensi;

use Livewire\Component;
use App\Models\PoinSantri;
use Livewire\WithPagination;
use App\Models\PresensiSholat;
use Livewire\Attributes\Title;
use App\Models\PelanggaranSantri;

class PerbaikanPresensiSholat extends Component
{
  use WithPagination;

    #[Title('Perbaikan Presensi Sholat')]

    public $page; 
    public $paginate = 20;
    public $search;
    public $role;

    
    public $titleModal;
    public $presensiSholat;
    public $santri_name;
    public $waktu;
    public $keterangan;

    public function mount()
    {
      $this->role = explode('/', request()->path())[0];
    }

    public function pilih($id)
    {
      $this->titleModal = 'Perbaikan Presensi Sholat';
      $this->presensiSholat = PresensiSholat::find($id);
      $this->santri_name = $this->presensiSholat->santri->name;
      $this->waktu = $this->presensiSholat->waktu;
      $this->keterangan = $this->presensiSholat->keterangan;

    }

    public function ubah()
    {
        // jika diubah menjadi alpha

        if ($this->keterangan == 'A') {
          $kode = abs(mt_rand(10000, 999999));
            $this->presensiSholat->update([
                'keterangan' => 'A',
                'pelanggaran_id' => $kode
            ]);

            $queryPoin = PoinSantri::where('santri_id', $this->presensiSholat->santri_id)->first();

            if ($queryPoin) {
                $queryPoin->update([
                    'poin_ibadah' => $queryPoin->poin_ibadah + 1
                ]);
            } else {
                PoinSantri::create([
                    'santri_id' => $this->presensiSholat->santri_id,
                    'poin_ibadah' => 1
                ]);
            }


            PelanggaranSantri::create([
              'lembaga_id' => $this->lembaga->id,
                'referensi_poin_id' => 1,
                'santri_id' => $this->presensiSholat->santri_id,
                'tanggal' => date('Y-m-d', time()),
                'keterangan' => 'Alpha Sholat ' . $this->presensiSholat->waktu,
                'poin' => 1,
                'user_id' => $this->presensiSholat->user_id,
                'pelanggaran_id' => $kode
            ]);
        } else {
            // diupdate ke selain alpha namun asalnya alpha
            if ($this->presensiSholat->keterangan == 'A') {
                $this->presensiSholat->update([
                    'keterangan' => $this->keterangan
                ]);

                PelanggaranSantri::where('pelanggaran_id', $this->presensiSholat->pelanggaran_id)->first()->delete();

                $queryPoin = PoinSantri::where('santri_id', $this->presensiSholat->santri_id)->first();

                $queryPoin->update([
                    'poin_ibadah' => $queryPoin->poin_ibadah - 1
                ]);
            } else {
                $this->presensiSholat->update([
                    'keterangan' => $this->keterangan
                ]);
            }
        }

        session()->flash('success', 'Perbaikan Presensi ' . $this->presensiSholat->santri->name . ' berhasil');
        return $this->redirect('/'. $this->role .'/perbaikanPresensiSholat', true);
    }

    public function delete($id)
    {
      $presensiSholat = PresensiSholat::find($id);
      if ($presensiSholat->keterangan == 'A') {

            PelanggaranSantri::where('pelanggaran_id', $presensiSholat->pelanggaran_id)->first()->delete();

            $queryPoin = PoinSantri::where('santri_id', $presensiSholat->santri_id)->first();

            $queryPoin->update([
                'poin_ibadah' => $queryPoin->poin_ibadah - 1
            ]);
        }

        $presensiSholat->delete();

        session()->flash('success', 'Data berhasil dihapus');

        return $this->redirect('/' . $this->role .'/perbaikanPresensiSholat', true);
    }

    public function render()
    {
        if ($this->search) {
          $presensis = PresensiSholat::filter($this->search)->latest()->get();
        } else {
          $presensis = PresensiSholat::latest()->paginate($this->paginate);
        }
        return view('livewire.perbaikan-presensi.perbaikan-presensi-sholat', [
          'presensis' => $presensis
        ]);
    }
}
