<?php

namespace App\Handler;

use App\Models\PoinSantri;
use Illuminate\Http\Request;

class PoinHandle
{
  public static function store($santriId, $modelPoin)
  {
    $queryPoin = PoinSantri::where('santri_id', $santriId)->first();

    if ($queryPoin) {
      $queryPoin->update([
        $modelPoin => $queryPoin->$modelPoin + 1
      ]);
    } else {
      PoinSantri::create([
        'santri_id' => $santriId,
        $modelPoin => 1
      ]);
    }
  }
}
