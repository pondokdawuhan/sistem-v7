<?php

namespace App\Jobs;

use App\Models\Lembaga;
use App\Models\Pelajaran;
use App\Models\PelanggaranSantri;
use App\Models\PoinSantri;
use App\Models\Presensi;
use App\Models\PresensiMa;
use App\Models\PresensiMadin;
use App\Models\PresensiMmq;
use App\Models\PresensiSmp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StorePresensi implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $lembaga;
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
              
                $lembaga = Lembaga::find($this->data['lembaga_id']);
                switch ($lembaga->jenis_lembaga) {
                  case 'FORMAL':
                    $modelPoin = 'poin_formal';
                    break;
                  case 'MADIN':
                    $modelPoin = 'poin_madin';
                    break;
                  case 'MMQ':
                    $modelPoin = 'poin_mmq';
                    break;
                }

                if ($this->data['keterangans'][$i] == 'A') {
                    $queryPoin = PoinSantri::where('santri_id', $this->data['santri_id'][$i])->first();

                    if ($queryPoin) {
                        $queryPoin->update([
                            $modelPoin => $queryPoin->$modelPoin + 1
                        ]);
                    } else {
                        PoinSantri::create([
                            'santri_id' => $this->data['santri_id'][$i],
                            $modelPoin => 1
                        ]);
                    }

                    $pelajaran = Pelajaran::find($this->data['pelajaran_id']);

                    PelanggaranSantri::create([
                        'lembaga_id' => $this->data['lembaga_id'],
                        'referensi_poin_id' => 1,
                        'santri_id' => $this->data['santri_id'][$i],
                        'tanggal' => date('Y-m-d', time()),
                        'keterangan' => 'Alpha Pelajaran ' . $pelajaran->nama . ' jam ke ' . $this->data['jam'],
                        'poin' => 1,
                        'user_id' => $this->data['user_id'],
                        'pelanggaran_id' => $kode
                    ]);
                }

                Presensi::create([
                    'santri_id' => $this->data['santri_id'][$i],
                    'pelajaran_id' => $this->data['pelajaran_id'],
                    'kelas_id' => $this->data['kelas_id'],
                    'lembaga_id' => $this->data['lembaga_id'],
                    'user_id' => $this->data['user_id'],
                    'jam' => $this->data['jam'],
                    'keterangan' => $this->data['keterangans'][$i],
                    'is_guru_piket' => $this->data['is_guru_piket'],
                    'pelanggaran_id' => $kode
                ]);

            }
        }

    }

}
