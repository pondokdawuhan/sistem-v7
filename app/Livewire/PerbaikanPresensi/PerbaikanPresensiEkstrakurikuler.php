<?php

namespace App\Livewire\PerbaikanPresensi;

use Livewire\Component;
use App\Models\PoinSantri;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\PelanggaranSantri;
use App\Models\PresensiEkstrakurikuler;

class PerbaikanPresensiEkstrakurikuler extends Component
{ 
    use WithPagination;

    public $page;
    public $paginate = 20;
    public $search;
    public $role;

    public $titleModal;
    public $santri_name;
    public $keterangan;
    public $ekstra;
    public $presensi;



    #[Title('Perbaikan Presensi Ekstrakurikuler')]

    public function mount()
    {
      $this->role = explode('/', request()->path())[0];
    }

    public function pilih($id)
    { 
      $presensi = PresensiEkstrakurikuler::find($id);

      $this->presensi = $presensi;
      $this->titleModal = 'Perbaikan Presensi ' . $presensi->santri->name;
      $this->santri_name = $presensi->santri->name;
      $this->ekstra = $presensi->ekstrakurikuler->nama;
      $this->keterangan = $presensi->keterangan;
    }

    public function ubah()
    {
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
                    'poin_ekstrakurikuler' => $queryPoin->poin_ekstrakurikuler + 1
                ]);
            } else {
                PoinSantri::create([
                    'santri_id' => $this->presensi->santri_id,
                    'poin_ekstrakurikuler' => 1
                ]);
            }

            PelanggaranSantri::create([
              'lembaga_id' => 0,
                'referensi_poin_id' => 1,
                'santri_id' => $this->presensi->santri_id,
                'tanggal' => date('Y-m-d', time()),
                'keterangan' => 'Alpha Ekstrakurikuler ' . $this->presensi->ekstrakurikuler->nama,
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
                    'poin_ekstrakurikuler' => $queryPoin->poin_ekstrakurikuler - 1
                ]);
            } else {
                $this->presensi->update([
                    'keterangan' => $this->keterangan
                ]);
            }
        }

        session()->flash('success', 'Presensi berhasil diubah');
    }

    public function delete($id)
    {
      $presensi = PresensiEkstrakurikuler::find($id);
      if ($presensi->keterangan == 'A') {
            PelanggaranSantri::where('pelanggaran_id', $presensi->pelanggaran_id)->first()->delete();

            $queryPoin = PoinSantri::where('santri_id', $presensi->santri_id)->first();

            $queryPoin->update([
                'poin_ekstrakurikuler' => $queryPoin->poin_ekstrakurikuler - 1
            ]);
        }

        $presensi->delete();
        
        session()->flash('success', 'Presensi berhasil dihapus');
    }

    public function render()
    {
        if ($this->search) {
          $presensis = PresensiEkstrakurikuler::with('user', 'santri')->filter($this->search)->latest()->get();
          $this->page = 1;
        } else {
          $presensis = PresensiEkstrakurikuler::with('user', 'santri')->latest()->paginate($this->search);
          $this->page = $presensis->firstItem();
        }
        return view('livewire.perbaikan-presensi.perbaikan-presensi-ekstrakurikuler', [
          'presensis' => $presensis
        ]);
    }
}
