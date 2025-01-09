<?php

namespace App\Jobs;

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
              $kode = abs(mt_rand(10000, 999999));
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
                $queryPoin = PoinSantri::where('santri_id', $this->data['santri_id'][$i])->first();

                if ($queryPoin) {
                    $queryPoin->update([
                        'poin_ekstrakurikuler'=> $queryPoin->poin_ekstrakurikuler + 1
                    ]);
                } else {
                    PoinSantri::create([
                        'santri_id' => $this->data['santri_id'][$i],
                        'poin_ekstrakurikuler' => 1
                    ]);
                }


                $ekstrakurikuler = Ekstrakurikuler::find($this->data['ekstrakurikuler_id']);

                PelanggaranSantri::create([
                    'lembaga_id' => 0,
                    'referensi_poin_id' => 1,
                    'santri_id' => $this->data['santri_id'][$i],
                    'tanggal' => date('Y-m-d', time()),
                    'keterangan' => 'Alpha Ekstrakurikuler ' . $ekstrakurikuler->nama,
                    'poin' => 1,
                    'user_id' => $this->data['user_id'],
                    'pelanggaran_id' => $kode
                ]);
            }
        }
    }
    }
}
