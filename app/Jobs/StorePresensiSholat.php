<?php

namespace App\Jobs;

use App\Models\PoinSantri;
use Illuminate\Bus\Queueable;
use App\Models\PresensiSholat;
use App\Models\PelanggaranSantri;
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
                    $queryPoin = PoinSantri::where('santri_id', $this->data['santri_id'][$i])->first();

                    if ($queryPoin) {
                        $queryPoin->update([
                            'poin_ibadah' => $queryPoin->poin_ibadah + 1
                        ]);
                    } else {
                        PoinSantri::create([
                            'santri_id' => $this->data['santri_id'][$i],
                            'poin_ibadah' => 1
                        ]);
                    }

                    PelanggaranSantri::create([
                        'lembaga_id' => $this->data['lembaga'],
                        'referensi_poin_id' => 1,
                        'santri_id' => $this->data['santri_id'][$i],
                        'tanggal' => date('Y-m-d', time()),
                        'keterangan' => 'Alpha Sholat ' . $this->data['waktu'],
                        'poin' => 1,
                        'user_id' => $this->data['user_id'],
                        'pelanggaran_id' => $kode
                    ]);
                }
            }
        }
    }
}
