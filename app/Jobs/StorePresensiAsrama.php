<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\PelanggaranSantri;
use App\Models\PoinSantri;
use App\Models\PresensiAsrama;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class StorePresensiAsrama implements ShouldQueue
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
                PresensiAsrama::create([
                    'lembaga_id' => $this->data['lembaga'],
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
                            'poin_asrama' => $queryPoin->poin_asrama + 1
                        ]);
                    } else {
                        PoinSantri::create([
                            'santri_id' => $this->data['santri_id'][$i],
                            'poin_asrama' => 1
                        ]);
                    }

                    PelanggaranSantri::create([
                      'lembaga_id' => $this->data['lembaga'],
                        'referensi_poin_id' => 1,
                        'santri_id' => $this->data['santri_id'][$i],
                        'user_id' => $this->data['user_id'],
                        'tanggal' => date('Y-m-d', time()),
                        'keterangan' => 'Alpha Kegiatan ' . $this->data['kegiatan'] . ' Presensi Asrama',
                        'poin' => 1,
                        'pelanggaran_id' => $kode
                    ]);
                }
            }
        }
    }
}
