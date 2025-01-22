<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function lembaga()
    {
      return $this->belongsTo(Lembaga::class)->withTrashed();
    }

    public function user()
    {
      return $this->belongsTo(User::class)->withTrashed();
    }

    public function userMengajar()
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
    
    public function jadwalPelajaran()
    {
      return $this->hasMany(JadwalPelajaran::class);
    }

    public function jurnalSholatSantri()
    {
      return $this->hasMany(JurnalSholatSantri::class);
    }

    public function jurnalPresensiInsidentilSantri()
    {
      return $this->hasMany(JurnalPresensiInsidentilSantri::class);
    }

    public function jurnalPresensiAsrama()
    {
      return $this->hasMany(JurnalPresensiAsrama::class);
    }

    public function scopeFilterByLembaga($query, $keyword) {
      return $query->where('lembaga_id', $keyword);
    }
}
