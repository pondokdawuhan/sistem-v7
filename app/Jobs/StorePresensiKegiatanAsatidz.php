<?php

namespace App\Jobs;

use App\Handler\PelanggaranPendampingHandle;
use App\Handler\PoinPendampingHandle;
use App\Models\Lembaga;
use Illuminate\Bus\Queueable;
use App\Models\PoinPendamping;
use App\Models\PelanggaranPendamping;
use Illuminate\Queue\SerializesModels;
use App\Models\PresensiKegiatanAsatidz;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\PresensiKegiatanPendamping;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class StorePresensiKegiatanAsatidz implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  /**
   * Create a new job instance.
   */
  protected $data;
  protected $lembaga;
  public function __construct($data)
  {
    $this->data = $data;
    $this->lembaga = Lembaga::find($data['lembaga_id']);
  }

  /**
   * Execute the job.
   */
  public function handle(): void
  {
    for ($i = 0; $i < count($this->data['user_id']); $i++) {
      if ($this->lembaga->jenis_lembaga == 'ASRAMA') {
        if ($this->data['keterangans'][$i] != 'H') {
          if ($this->data['keterangans'][$i] == 'A') {
            $kode = generateKodePelanggaranSantri();
          } else {
            $kode = null;
          }
          PresensiKegiatanAsatidz::create([
            'user_id' => $this->data['user_id'][$i],
            'lembaga_id' => $this->data['lembaga_id'],
            'kegiatan' => $this->data['kegiatan'],
            'keterangan' => $this->data['keterangans'][$i],
            'pelanggaran_id' => $kode
          ]);

          if ($this->data['keterangans'][$i] == 'A') {
            PoinPendampingHandle::store($this->data['user_id'][$i], 'poin_kegiatan');

            PelanggaranPendampingHandle::store($this->data['user_id'][$i], 'Alpha Kegiatan ' . $this->data['kegiatan'], $kode);
          }
        }
      } else {
        if ($this->data['keterangans'][$i] != 'H') {
          PresensiKegiatanAsatidz::create([
            'user_id' => $this->data['user_id'][$i],
            'lembaga_id' => $this->data['lembaga_id'],
            'kegiatan' => $this->data['kegiatan'],
            'keterangan' => $this->data['keterangans'][$i],
          ]);
        }
      }
    }
  }
}
