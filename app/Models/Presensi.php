<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function lembaga()
    {
      return $this->belongsTo(Lembaga::class);
    }

    public function pelajaran()
    {
      return $this->belongsTo(Pelajaran::class);
    }

    public function kelas()
    {
      return $this->belongsTo(Kelas::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function santri()
    {
      return $this->belongsTo(Santri::class);
    }

    public function scopeFilter($query, $keyword)
    {
      return $query->whereRelation('santri', 'name', 'like', '%' . $keyword . '%');
    }

    public function scopeRekapMapel($query, $pelajaran)
    {
      if ($pelajaran == 'semua') {
        return $query;
      } else {
        return $query->where('pelajaran_id', $pelajaran);
      }
    }

    public function scopeRekapKelas($query, $kelas)
    {
      if ($kelas == 'semua') {
        return $query;
      } else {
        return $query->where('kelas_id', $kelas);
      }
    }
}
