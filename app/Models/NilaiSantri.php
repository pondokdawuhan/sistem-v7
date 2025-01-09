<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSantri extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function santri()
    {
      return $this->belongsTo(Santri::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function pelajaran()
    {
      return $this->belongsTo(Pelajaran::class);
    }

    public function lembaga()
    {
      return $this->belongsTo(Lembaga::class);
    }

    public function scopeFilter($query, $keyword)
    {
      return $query->whereRelation('santri', 'name', 'like', '%' . $keyword . '%');
    }

    public function scopeGetNilaiByKelasPelajaran($query, $santris, $pelajaran, $semester, $tahun)
    {
      $array = [];
      foreach ($santris as $santri) {
        array_push($array, $santri->id);
      }
      return $query->whereIn('santri_id', $array)->where('pelajaran_id', $pelajaran)->where('semester', $semester)->where('tahun', $tahun);
    }
}
