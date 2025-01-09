<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalEkstrakurikuler extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['ekstrakurikuler'];


    public function user() 
    {
      return $this->belongsTo(User::class);
    }

    public function ekstrakurikuler()
    {
      return $this->belongsTo(Ekstrakurikuler::class);
    }

    public function scopeFilter($query, $keyword)
     {
      return $query->where('materi', 'like', '%' . $keyword . '%');
    }
}
