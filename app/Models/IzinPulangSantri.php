<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinPulangSantri extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['santri', 'user'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    public function scopeFilter($query, $keyword)
    {
        return $query->whereRelation('santri', 'name', 'like', '%' . $keyword . '%')->orWhereRelation('user', 'name', 'like', '%' . $keyword . '%');
    }

    public static function getIzinPulangSantriBerlaku()
    {
        $izinPulangSantris = [];

        $dataIzinPulangSantris = IzinPulangSantri::where('waktu_selesai', '>', date('Y-m-d H:i:s', time()))->where('waktu_kembali', null)->get();

        foreach ($dataIzinPulangSantris as $dataIzinPulang) {
            array_push($izinPulangSantris, $dataIzinPulang->santri_id);
        }

        return $izinPulangSantris;
    }
}
