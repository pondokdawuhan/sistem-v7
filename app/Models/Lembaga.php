<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lembaga extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];


    public function kelas()
    {
      return $this->hasMany(Kelas::class);
    }

    public function pelajaran()
    {
      return $this->hasMany(Pelajaran::class);
    }

    public function user()
    {
      return $this->belongsToMany(User::class);
    }

    public function presensi()
    {
      return $this->hasMany(Presensi::class);
    }

    public function jurnal()
    {
      return $this->hasMany(Jurnal::class);
    }

    public function izinAsatidz()
    {
      return $this->hasMany(izinAsatidz::class);
    }

    public function nilaiSantri()
    {
      return $this->hasMany(NilaiSantri::class);
    }

    public function presensiSholat()
    {
      return $this->hasMany(PresensiSholat::class);
    }

    public function hafalanSantri()
    {
      return $this->hasMany(HafalanSantri::class);
    }

    public function jadwalPelajaran()
    {
      return $this->hasMany(JadwalPelajaran::class);
    }

    public function PresensiInsidentil()
    {
      return $this->hasMany(PresensiInsidentilSantri::class);
    }

    public function jurnalSholatSantri()
    {
      return $this->hasMany(JurnalSholatSantri::class);
    }

    public function jurnalPresensiInsidentilSantri()
    {
      return $this->hasMany(JurnalPresensiInsidentilSantri::class);
    }

    public function presensiKegiatanAsatidz()
    {
      return $this->hasMany(PresensiKegiatanAsatidz::class);
    }

    public function pelanggaranSantri()
    {
      return $this->hasMany(PelanggaranSantri::class);
    }

    public function penghargaanSantri()
    {
      return $this->hasMany(PenghargaanSantri::class);
    }

    public function penguranganPoin()
    {
      return $this->hasMany(PenguranganPoin::class);
    }

    public function pembinaanSantri()
    {
      return $this->hasMany(PembinaanSantri::class);
    }

    public function catatanSantri()
    {
      return $this->hasMany(CatatanSantri::class);
    }

    public function jurnalPresensiAsrama()
    {
      return $this->hasMany(JurnalPresensiAsrama::class);
    }

    public function dataSantri()
    {
      return $this->hasMany(DataSantri::class);
    }


}
