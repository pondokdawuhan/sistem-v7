<?php

namespace App\Handler;

use App\Models\PelanggaranPendamping;
use Illuminate\Http\Request;
use App\Models\PelanggaranSantri;

class PelanggaranPendampingHandle
{
  public static function store($userId, $keterangan, $kode)
  {
    PelanggaranPendamping::create([
      'referensi_poin_id' => 1,
      'user_id' => $userId,
      'tanggal' => date('Y-m-d', time()),
      'keterangan' => $keterangan,
      'poin' => 1,
      'pelanggaran_id' => $kode
    ]);
  }
}
