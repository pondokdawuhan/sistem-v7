<?php

namespace App\Jobs;

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

     protected $data ;
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
                    $queryPoin = PoinPendamping::where('user_id', $this->data['user_id'][$i])->first();

                    if ($queryPoin) {
                        $queryPoin->update([
                            'poin_ibadah' => $queryPoin->poin_ibadah + 1
                        ]);
                    } else {
                        PoinPendamping::create([
                            'user_id' => $this->data['user_id'][$i],
                            'poin_ibadah' => 1
                        ]);
                    }

                    PelanggaranPendamping::create([
                        'referensi_poin_id' => 1,
                        'user_id' => $this->data['user_id'][$i],
                        'tanggal' => date('Y-m-d', time()),
                        'keterangan' => 'Alpha Sholat ' . $this->data['waktu'],
                        'poin' => 1,
                        'pelanggaran_id' => $kode
                    ]);
                }
            }
        }
    }
}
