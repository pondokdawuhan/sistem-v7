<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function lembaga()
    {
      return $this->belongsTo(Lembaga::class)->withTrashed();
    }

    public function kelas()
    {
      return $this->belongsTo(Kelas::class)->withTrashed();
    }

    public function pelajaran()
    {
      return $this->belongsTo(Pelajaran::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class)->withTrashed();
    }

    public function scopeFilter($query, $keyword)
    {
      return $query->whereRelation('kelas', 'nama', 'like', '%' . $keyword . '%')->orWhere('materi', 'like', '%' . $keyword . '%')->orWhereRelation('pelajaran', 'nama', 'like', '%' . $keyword . '%')->orWhereRelation('lembaga', 'nama', 'like', '%' . $keyword . '%')->orWhereRelation('lembaga', 'nama_singkat', 'like', '%' . $keyword . '%');
    }

    public function scopeSelectedLembaga($query, $lembaga)
    {
      if ($lembaga != 'semua') {
        return $query->where('lembaga_id', $lembaga);
      }
    }

    public function scopeGuruPiket($query, $guruPiket)
    {
      if ($guruPiket != 'semua') {
        return $query->where('is_guru_piket', $guruPiket);
      }
    }
}
