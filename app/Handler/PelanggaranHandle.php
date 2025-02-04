<?php

namespace App\Handler;

use Illuminate\Http\Request;
use App\Models\PelanggaranSantri;

class PelanggaranHandle
{
  public static function store($lembagaId, $santriId, $keterangan, $userId, $pelanggaranId)
  {
    PelanggaranSantri::create([
      'lembaga_id' => $lembagaId,
      'referensi_poin_id' => 1,
      'santri_id' => $santriId,
      'tanggal' => date('Y-m-d', time()),
      'keterangan' => $keterangan,
      'poin' => 1,
      'user_id' => $userId,
      'pelanggaran_id' => $pelanggaranId
    ]);
  }
}
