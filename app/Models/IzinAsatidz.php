<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinAsatidz extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function lembaga()
    {
      return $this->belongsTo(Lembaga::class);
    }

    public function scopeFilter($query, $keyword)
    {
      return $query->whereRelation('user', 'name', 'like', '%' . $keyword . '%');
    }

     public static function getIzinBerlaku()
    {
        $izinAsatidz = [];

        $dataizinAsatidz = IzinAsatidz::where('tanggal_selesai', '>', date('Y-m-d H:i:s', time()))->get();

        foreach ($dataizinAsatidz as $dataIzinKeluar) {
            array_push($izinAsatidz, $dataIzinKeluar->user_id);
        }

        return $izinAsatidz;
    }
}
