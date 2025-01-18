<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'google_id',
        'google_user_token'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    
    public function getRouteKeyName()
    {
        return 'username';
    }

    
    public function scopeUserAktif($query)
    {
      return $query->whereRelation('dataUser', 'aktif', true);
    }
    
    public function scopeUserByJenisKelamin($query, $keyword)
    {
      return $query->whereRelation('dataUser', 'jenis_kelamin', $keyword);
    }

    public function scopeFilter($query, $keyword)
    {
      return $query->where('name', 'like', '%' . $keyword . '%');
    }

    public static function lembagaUser($user)
    {
      $array = [];
      if ($user->lembaga) {
        foreach ($user->lembaga as $lembaga) {
          array_push($array, $lembaga->id);
        }
      }

      return $array;
    }

    public static function kelasUser($user)
    {
      $array = [];
      if ($user->kelasMengajar) {
        foreach ($user->kelasMengajar as $kelas) {
          array_push($array, $kelas->id);
        }
      }

      return $array;
    }

    public static function pelajaranUser($user)
    {
      $array = [];
      if ($user->pelajaran) {
        foreach ($user->pelajaran as $kelas) {
          array_push($array, $kelas->id);
        }
      }

      return $array;
    }

    public static function ekstraUser($user)
    {
      $array = [];
      if ($user->ekstrakurikuler) {
        foreach ($user->ekstrakurikuler as $ekstra) {
          array_push($array, $ekstra->id);
        }
      }

      return $array;
    }

    public static function roleUser($user)
    {
      $array = [];
      if ($user->roles) {
        foreach ($user->roles as $role) {
          array_push($array, $role->name);
        }
      }

      return $array;
    }


    public function kelas()
    {
      return $this->hasMany(Kelas::class);
    }

    public function kelasMengajar()
    {
      return $this->belongsToMany(Kelas::class);
    }

    public function dataUser()
    {
      return $this->hasOne(DataUser::class);
    }

    public function lembaga()
    {
      return $this->belongsToMany(Lembaga::class);
    }

    public function pelajaran()
    {
      return $this->belongsToMany(Pelajaran::class);
    }

    public function ekstrakurikuler()
    {
      return $this->hasMany(Ekstrakurikuler::class);
    }

    public function presensi()
    {
      return $this->hasMany(Presensi::class);
    }

    public function santriSakit()
    {
      return $this->hasMany(IzinSakitSantri::class);
    }

    public function pelanggaranSantri()
    {
      return $this->hasMany(PelanggaranSantri::class);
    }

    public function jurnal()
    {
      return $this->hasMany(Jurnal::class);
    }

    public function izinAsatidz()
    {
      return $this->hasMany(IzinAsatidz::class);
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

    public function presensiSholatPendamping()
    {
      return $this->hasMany(PresensiSholatPendamping::class);
    }

    public function presensiKegiatanPendamping()
    {
      return $this->hasMany(PresensiKegiatanPendamping::class);
    }

    public function hafalanSantri()
    {
      return $this->hasMany(HafalanSantri::class);
    }

    public function presensiEkstrakurikuler()
    {
      return $this->hasMany(presensiEkstrakurikuler::class);
    }

    public function jurnalEkstrakurikuler()
    {
      return $this->hasMany(JurnalEkstrakurikuler::class);
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

    public function jurnalPresensiAsrama()
    {
      return $this->hasMany(JurnalPresensiAsrama::class);
    }

    public function poinPendamping()
    {
      return $this->hasOne(PoinPendamping::class);
    }

    public function catatanAsatidz()
    {
      return $this->hasMany(catatanAsatidz::class);
    }

}
