<?php

namespace App\Jobs;

use App\Handler\PelanggaranHandle;
use App\Handler\PoinHandle;
use App\Models\Lembaga;
use App\Models\Presensi;
use App\Models\Pelajaran;
use App\Models\PoinSantri;
use App\Models\PresensiMa;
use App\Models\PresensiMmq;
use App\Models\PresensiSmp;
use Illuminate\Http\Request;
use App\Models\PresensiMadin;
use Illuminate\Bus\Queueable;
use App\Traits\PelanggaranTrait;
use App\Models\PelanggaranSantri;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

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
          PoinHandle::store($this->data['santri_id'][$i], $modelPoin);

          $pelajaran = Pelajaran::find($this->data['pelajaran_id']);

          PelanggaranHandle::store(
            $this->data['lembaga_id'],
            $this->data['santri_id'][$i],
            'Alpha Pelajaran ' . $pelajaran->nama . ' jam ke ' . $this->data['jam'],
            $this->data['user_id'],
            $kode
          );
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
