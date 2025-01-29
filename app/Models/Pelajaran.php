<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelajaran extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function lembaga()
    {
      return $this->belongsTo(Lembaga::class)->withTrashed();
    }

    public function user()
    {
      return $this->belongsToMany(User::class)->withTrashed();
    }

    public function presensi()
    {
      return $this->hasMany(Presensi::class);
    }

    public function jurnal()
    {
      return $this->hasMany(Jurnal::class);
    }

    public function nilaiSantri()
    {
      return $this->hasMany(NilaiSantri::class);
    }

    
    public function jadwalPelajaran()
    {
      return $this->hasMany(JadwalPelajaran::class);
    }

    public function scopeFilterByLembaga($query, $keyword)
    {
      return $query->where('lembaga_id', $keyword);
    }
}
