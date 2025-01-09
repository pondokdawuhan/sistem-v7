<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiSholatPendamping extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user() {
      return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $keyword) {
      return $query->whereRelation('user', 'name', 'like', '%' . $keyword . '%');
    }
}
