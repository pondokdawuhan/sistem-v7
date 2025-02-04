<?php

namespace App\Handler;

use App\Models\PoinPendamping;
use Illuminate\Http\Request;

class PoinPendampingHandle
{
  public static function store($userId, $modelPoin)
  {
    $queryPoin = PoinPendamping::where('user_id', $userId)->first();

    if ($queryPoin) {
      $queryPoin->update([
        $modelPoin => $queryPoin->$modelPoin + 1
      ]);
    } else {
      PoinPendamping::create([
        'user_id' => $userId,
        $modelPoin => 1
      ]);
    }
  }
}
