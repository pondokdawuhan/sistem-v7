<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelanggaranSantri extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function santri()
    {
      return $this->belongsTo(Santri::class)->withTrashed();
    }

    public function user()
    {
      return $this->belongsTo(User::class)->withTrashed();
    }

    public function referensiPoin()
    {
      return $this->belongsTo(ReferensiPoin::class);
    }

    public function lembaga()
    {
      return $this->belongsTo(Lembaga::class)->withTrashed();
    }

    public function scopeFilter($query, $keyword)
    {
      return $query->whereRelation('santri', 'name', 'like', '%' . $keyword . '%');
    }
}
