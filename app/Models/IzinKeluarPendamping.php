<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinKeluarPendamping extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['user'];

    public function scopeFilter($query, $keyword)
    {
        return $query->whereRelation('user', 'name', 'like', '%' . $keyword . '%')->orWhere('user_id', $keyword);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getIzinKeluarPendampingBerlaku()
    {
        $izinKeluarPendampings = [];

        $dataIzinKeluarPendampings = IzinKeluarPendamping::where('waktu_selesai', '>', date('Y-m-d H:i:s', time()))->where('waktu_kembali', null)->get();

        foreach ($dataIzinKeluarPendampings as $dataIzinKeluar) {
            array_push($izinKeluarPendampings, $dataIzinKeluar->user_id);
        }

        return $izinKeluarPendampings;
    }
}
