<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiEkstrakurikuler extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function santri() {
      return $this->belongsTo(Santri::class);
    }

    public function ekstrakurikuler() {
      return $this->belongsTo(Ekstrakurikuler::class);
    }

    public function scopeFilter($query, $keyword) {
      return $query->whereRelation('santri', 'name', 'like', '%' . $keyword . '%');
    }

}
