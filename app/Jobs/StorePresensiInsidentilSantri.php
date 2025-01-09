<?php

namespace App\Jobs;

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
              $kode = abs(mt_rand(10000, 999999));
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
                    $queryPoin = PoinSantri::where('santri_id', $this->data['santri_id'][$i])->first();

                    if ($queryPoin) {
                        $queryPoin->update([
                            'poin_pelanggaran' => $queryPoin->poin_pelanggaran + 1
                        ]);
                    } else {
                        PoinSantri::create([
                            'santri_id' => $this->data['santri_id'][$i],
                            'poin_pelanggaran' => 1
                        ]);
                    }

                    PelanggaranSantri::create([
                      'lembaga_id' => $this->data['lembaga_id'],
                        'referensi_poin_id' => 1,
                        'santri_id' => $this->data['santri_id'][$i],
                        'user_id' => $this->data['user_id'],
                        'tanggal' => date('Y-m-d', time()),
                        'keterangan' => 'Alpha Kegiatan ' . $this->data['kegiatan'] . ' ' . $this->data['lembaga_name'],
                        'poin' => 1,
                        'pelanggaran_id' => $kode
                    ]);
                }
            }
        }
    }
}
