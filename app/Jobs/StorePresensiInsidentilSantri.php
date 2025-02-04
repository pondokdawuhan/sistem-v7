<?php

namespace App\Jobs;

use App\Handler\PelanggaranHandle;
use App\Handler\PoinHandle;
use Illuminate\Bus\Queueable;
use App\Models\PelanggaranSantri;
use App\Models\PoinSantri;
use App\Models\PresensiAsrama;
use App\Models\PresensiInsidentilSantri;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class StorePresensiInsidentilSantri implements ShouldQueue
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

    for ($i = 0; $i < count($this->data['santri_id']); $i++) {
      if ($this->data['keterangans'][$i] == 'A') {
        $kode = generateKodePelanggaranSantri();
      } else {
        $kode = null;
      }

      if ($this->data['keterangans'][$i] != 'H') {
        PresensiInsidentilSantri::create([
          'lembaga_id' => $this->data['lembaga_id'],
          'santri_id' => $this->data['santri_id'][$i],
          'user_id' => $this->data['user_id'],
          'kegiatan' => $this->data['kegiatan'],
          'keterangan' => $this->data['keterangans'][$i],
          'pelanggaran_id' => $kode
        ]);

        if ($this->data['keterangans'][$i] == 'A') {
          PoinHandle::store($this->data['santri_id'][$i], 'poin_pelanggaran');

          PelanggaranHandle::store($this->data['lembaga_id'], $this->data['santri_id'][$i], 'Alpha Kegiatan ' . $this->data['kegiatan'] . ' ' . $this->data['lembaga_name'], $this->data['user_id'], $kode);
        }
      }
    }
  }
}
