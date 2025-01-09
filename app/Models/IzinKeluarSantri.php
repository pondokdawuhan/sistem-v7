<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinKeluarSantri extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['user', 'santri'];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $keyword)
    {
        return $query->whereRelation('santri', 'name', 'like', '%' . $keyword . '%')->orWhereRelation('user', 'name', 'like', '%' . $keyword . '%');
    }

    public static function getIzinKeluarSantriBerlaku()
    {
        $izinKeluarSantris = [];

        $dataIzinKeluarSantris = IzinKeluarSantri::where('waktu_selesai', '>', date('Y-m-d H:i:s', time()))->where('waktu_kembali', null)->get();

        foreach ($dataIzinKeluarSantris as $dataIzinKeluar) {
            array_push($izinKeluarSantris, $dataIzinKeluar->santri_id);
        }

        return $izinKeluarSantris;
    }
}
