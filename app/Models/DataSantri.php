<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSantri extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function santri()
    {
      return $this->belongsTo(Santri::class)->withTrashed();
    }

    public function lembaga()
    {
      return $this->belongsTo(Lembaga::class)->withTrashed();
    }
}
