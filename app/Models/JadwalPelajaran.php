<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Monolog\Level;

class JadwalPelajaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
      return $this->belongsTo(User::class)->withTrashed();
    }

    public function lembaga()
    {
      return $this->belongsTo(Lembaga::class)->withTrashed();
    }

    public function pelajaran()
    {
      return $this->belongsTo(Pelajaran::class);
    }

    public function kelas()
    {
      return $this->belongsTo(Kelas::class);
    }
}
