<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Santri extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
      return 'username';
    }

    public function scopeFilter($query, $keyword)
    {
      return $query->where('name', 'like', '%' . $keyword . '%');
    }

    public function scopeSantriAktif($query)
    {
      return $query->whereRelation('dataSantri', 'aktif', true);
    }

    
    public function scopeKabupaten($query, $keyword = null)
    {
      if ($keyword) {
        return $query->whereRelation('dataSantri', 'kabupaten', $keyword);
      } else {
        return $query->whereRelation('dataSantri', 'kabupaten', '!=', 'KOTA BLITAR')->whereRelation('dataSantri', 'kabupaten', '!=', 'KABUPATEN BLITAR');
      }
    }

    public function scopeKelas($query, $jenisLembaga, $kelas)
    {
        
        switch ($jenisLembaga) {
        case 'FORMAL':
          if ($kelas == 'semua') {
            return $query->whereNot('kelas_formal_id', null);
          } else {
            return $query->where('kelas_formal_id', $kelas);
          }
        break;
        case 'MADIN':
          if ($kelas == 'semua') {
            return $query->whereNot('kelas_madin_id', null);
          } else {
            return $query->where('kelas_madin_id', $kelas);
          }
        break;
        case 'MMQ':
          if ($kelas == 'semua') {
            return $query->whereNot('kelas_mmq_id', null);
          } else {
            return $query->where('kelas_mmq_id', $kelas);
          }
        break;
        case 'ASRAMA':
          if ($kelas == 'semua') {
            return $query->whereNot('kelas_asrama_id', null);
          } else {
            return $query->where('kelas_asrama_id', $kelas);
          }
        break;
        
          return $query->where('kelas_asrama_id', $kelas);
          break;
        
      }
    }

    public function dataSantri()
    {
      return $this->hasOne(DataSantri::class);
    }

    public static function getSantriByKelas($kelas, $lembaga)
    {
     
      switch ($lembaga) {
        case 'FORMAL':
          $santris = Santri::where('kelas_formal_id', $kelas)->get();
          break;
        case 'MADIN':
          $santris = Santri::where('kelas_madin_id', $kelas)->get();
          break;
        case 'MMQ':
          $santris = Santri::where('kelas_mmq_id', $kelas)->get();
          break;
        case 'ASRAMA':
          $santris = Santri::where('kelas_asrama_id', $kelas)->get();
          break;
        
      }
      return $santris;
    }

    
    public function ekstrakurikuler()
    {
      return $this->belongsToMany(Ekstrakurikuler::class);
    }

    public function presensi()
    {
      return $this->hasMany(Presensi::class);
    }

    public function sakit()
    {
      return $this->hasMany(IzinSakitSantri::class);
    }

    public function poinSantri()
    {
      return $this->hasOne(PoinSantri::class);
    }

    public function pelanggaranSantri()
    {
      return $this->hasMany(PelanggaranSantri::class);
    }

    public function haidSantri()
    {
      return $this->hasOne(HaidSantri::class);
    }

    public function pembinaanSantri()
    {
      return $this->hasMany(PembinaanSantri::class);
    }

    public function nilaiSantri()
    {
      return $this->hasMany(NilaiSantri::class);
    }

    public function penghargaanSantri()
    {
      return $this->hasMany(PenghargaanSantri::class);
    }

    public function penguranganPoin()
    {
      return $this->hasMany(PenguranganPoin::class);
    }

    public function presensiSholat()
    {
      return $this->hasMany(PresensiSholat::class);
    }

    public function presensiAsrama()
    {
      return $this->hasMany(PresensiAsrama::class);
    }

    public function hafalanSantri()
    {
      return $this->hasMany(HafalanSantri::class);
    }

    public function presensiEkstrakurikuler()
    {
      return $this->hasMany(PresensiEkstrakurikuler::class);
    }

    
    public function PresensiInsidentil()
    {
      return $this->hasMany(PresensiInsidentilSantri::class);
    }

    public function catatanSantri()
    {
      return $this->hasMany(CatatanSantri::class);
    }


}
