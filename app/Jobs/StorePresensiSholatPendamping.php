<?php

namespace App\Jobs;

use App\Handler\PelanggaranPendampingHandle;
use App\Handler\PoinPendampingHandle;
use App\Models\PelanggaranPendamping;
use App\Models\PoinPendamping;
use App\Models\PresensiSholatPendamping;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StorePresensiSholatPendamping implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  /**
   * Create a new job instance.
   */

  protected $data;
  public function __construct($data)
  {
    $this->data = $data;
  }

  /**
   * Execute the job.
   */
  public function handle(): void
  {

    for ($i = 0; $i < count($this->data['user_id']); $i++) {
      if ($this->data['keterangans'][$i] == 'A') {
        $kode = generateKodePelanggaranSantri();
      } else {
        $kode = null;
      }
      if ($this->data['keterangans'][$i] != 'H') {
        PresensiSholatPendamping::create([
          'lembaga_id' => $this->data['lembaga_id'],
          'user_id' => $this->data['user_id'][$i],
          'waktu' => $this->data['waktu'],
          'keterangan' => $this->data['keterangans'][$i],
          'pelanggaran_id' => $kode
        ]);

        if ($this->data['keterangans'][$i] == 'A') {
          PoinPendampingHandle::store($this->data['user_id'][$i], 'poin_ibadah');

          PelanggaranPendampingHandle::store($this->data['user_id'][$i], 'Alpha Sholat ' . $this->data['waktu'], $kode);
        }
      }
    }
  }
}
