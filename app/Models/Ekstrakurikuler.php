<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function scopeFilter($query, $keyword)
    {
        return $query->where('nama', 'like', '%' . $keyword . '%');
    }

    public function santri()
    {
        return $this->belongsToMany(Santri::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function presensiEkstrakurikuler() {
      return $this->hasMany(PresensiEkstrakurikuler::class);
    }
    public function jurnalEkstrakurikuler()
    {
      return $this->hasMany(JurnalEkstrakurikuler::class);
    }

    public static function queryEkstraUser($user)
    {

        if ($user->ekstrakurikuler) {
            $arrayEkstra = [];
            foreach ($user->ekstrakurikuler as $ekstra) {
                array_push($arrayEkstra, $ekstra->id);
            }
        } else {
            $arrayEkstra = null;
        }

        return $arrayEkstra;
    }
}
