<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Santri;
use App\Models\HaidSantri;
use App\Models\PresensiMa;
use App\Models\PresensiMmq;
use App\Models\PresensiSmp;
use App\Traits\WablasTrait;
use Illuminate\Support\Arr;
use App\Jobs\RaporSantriJob;
use Illuminate\Http\Request;
use App\Models\PresensiMadin;
use App\Jobs\CekHaidSantriJob;
use App\Models\PresensiAsrama;
use App\Models\PresensiSholat;
use App\Jobs\HitungHariHaidJob;
use App\Jobs\NotifMengajarJob;
use App\Models\JadwalPelajaranMa;
use App\Models\PelanggaranSantri;
use App\Models\JadwalPelajaranMmq;
use App\Models\JadwalPelajaranSmp;
use App\Models\JadwalPelajaranMadin;
use App\Models\RaporSantri;

class CronjobController extends Controller
{
    public function cekHaidSantri()
    {
      dispatch(new CekHaidSantriJob);
    }

    public function hitungHariHaid()
    {
      dispatch(new HitungHariHaidJob);
    }

    public function notifMengajar()
    {
      dispatch(new NotifMengajarJob);
    }


}
