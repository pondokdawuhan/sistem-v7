<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinPulangPendamping extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $keyword)
    {
        return $query->whereRelation('user', 'name', 'like', '%' . $keyword . '%')->orWhere('user_id', $keyword);
    }

    public static function getIzinPulangPendampingBerlaku()
    {
        $izinPulangPendampings = [];

        $dataIzinPulangPendampings = IzinPulangPendamping::where('waktu_selesai', '>', date('Y-m-d H:i:s', time()))->where('waktu_kembali', null)->get();

        foreach ($dataIzinPulangPendampings as $dataIzinPulang) {
            array_push($izinPulangPendampings, $dataIzinPulang->user_id);
        }

        return $izinPulangPendampings;
    }
}
