<?php

namespace App\Jobs;

use App\Models\PoinSantri;
use Illuminate\Bus\Queueable;
use App\Models\PresensiSholat;
use App\Models\PelanggaranSantri;
use App\Handler\PelanggaranHandle;
use App\Handler\PoinHandle;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class StorePresensiSholat implements ShouldQueue
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
        PresensiSholat::create([
          'santri_id' => $this->data['santri_id'][$i],
          'lembaga_id' => $this->data['lembaga'],
          'waktu' => $this->data['waktu'],
          'keterangan' => $this->data['keterangans'][$i],
          'user_id' => $this->data['user_id'],
          'pelanggaran_id' => $kode
        ]);

        if ($this->data['keterangans'][$i] == 'A') {
          PoinHandle::store($this->data['santri_id'][$i], 'poin_ibadah');

          PelanggaranHandle::store(
            $this->data['lembaga'],
            $this->data['santri_id'][$i],
            'Alpha Sholat ' . $this->data['waktu'],
            $this->data['user_id'],
            $kode
          );
        }
      }
    }
  }
}
