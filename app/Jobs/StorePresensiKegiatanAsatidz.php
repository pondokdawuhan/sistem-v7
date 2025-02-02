<?php

namespace App\Jobs;

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
                    $queryPoin = PoinPendamping::where('user_id', $this->data['user_id'][$i])->first();

                    if ($queryPoin) {
                        $queryPoin->update([
                            'poin_kegiatan' => $queryPoin->poin_kegiatan + 1
                        ]);
                    } else {
                        PoinPendamping::create([
                            'user_id' => $this->data['user_id'][$i],
                            'poin_kegiatan' => 1
                        ]);
                    }

                    PelanggaranPendamping::create([
                        'referensi_poin_id' => 1,
                        'user_id' => $this->data['user_id'][$i],
                        'tanggal' => date('Y-m-d', time()),
                        'keterangan' => 'Alpha Kegiatan ' . $this->data['kegiatan'],
                        'poin' => 1,
                        'pelanggaran_id' => $kode
                    ]);
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
