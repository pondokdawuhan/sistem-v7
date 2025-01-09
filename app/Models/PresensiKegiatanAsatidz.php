<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiKegiatanAsatidz extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function lembaga()
    {
      return $this->belongsTo(Lembaga::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $keyword)
    {
      return $query->whereRelation('user', 'name', 'like', '%' . $keyword . '%');
    }
}
