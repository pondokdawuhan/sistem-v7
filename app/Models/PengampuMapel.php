<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengampuMapel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'pelajaran_user';

    public function user()
    {
      return $this->belongsTo(User::class)->withTrashed();
    }

    public function pelajaran()
    {
      return $this->belongsTo(Pelajaran::class)->withTrashed();
    }
}
