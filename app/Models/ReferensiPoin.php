<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferensiPoin extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pelanggaranSantri()
    {
        return $this->hasMany(PelanggaranSantri::class);
    }

    public function pelanggaranPendamping()
    {
      return $this->hasMany(PelanggaranPendamping::class);
    }
}
