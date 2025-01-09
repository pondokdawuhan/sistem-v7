<?php

namespace App\Jobs;

use App\Models\HaidSantri;
use App\Models\PresensiMa;
use App\Models\PresensiMmq;
use App\Models\PresensiSmp;
use App\Models\PresensiMadin;
use Illuminate\Bus\Queueable;
use App\Models\PresensiAsrama;
use App\Models\PresensiSholat;
use App\Models\PelanggaranSantri;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class RaporSantriJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        PresensiSmp::generateLaporanAlpha();
        PresensiMa::generateLaporanAlpha();
        PresensiMadin::generateLaporanAlpha();
        PresensiMmq::generateLaporanAlpha();
        PelanggaranSantri::generateLaporanPelanggaran();
        PresensiSholat::generateLaporanAlpha();
        PresensiAsrama::generateLaporanAlpha();
        HaidSantri::generateLaporanHaid();
    }
}
