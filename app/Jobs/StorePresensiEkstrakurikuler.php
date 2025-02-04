<?php

namespace App\Jobs;

use App\Handler\PelanggaranHandle;
use App\Handler\PoinHandle;
use App\Models\PoinSantri;
use App\Models\Ekstrakurikuler;
use App\Models\PelanggaranSantri;
use App\Models\PresensiEkstrakurikuler;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StorePresensiEkstrakurikuler implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
  protected $data;
  /**
   * Create a new job instance.
   */
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
        PresensiEkstrakurikuler::create([
          'santri_id' => $this->data['santri_id'][$i],
          'ekstrakurikuler_id' => $this->data['ekstrakurikuler_id'],
          'user_id' => $this->data['user_id'],
          'keterangan' => $this->data['keterangans'][$i],
          'pelanggaran_id' => $kode
        ]);

        if ($this->data['keterangans'][$i] == 'A') {
          PoinHandle::store($this->data['santri_id'][$i], 'poin_ekstrakurikuler');

          $ekstrakurikuler = Ekstrakurikuler::find($this->data['ekstrakurikuler_id']);

          PelanggaranHandle::store(
            0,
            $this->data['santri_id'][$i],
            'Alpha Ekstrakurikuler ' . $ekstrakurikuler->nama,
            $this->data['user_id'],
            $kode
          );
        }
      }
    }
  }
}
