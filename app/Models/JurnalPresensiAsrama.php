<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalPresensiAsrama extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function lembaga()
    {
      return $this->belongsTo(Lembaga::class)->withTrashed();
    }

    public function user()
    {
      return $this->belongsTo(User::class)->withTrashed();
    }

    public function kelas()
    {
      return $this->belongsTo(Kelas::class);
    }
}
