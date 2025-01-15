<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinSakitSantri extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['user', 'santri'];

    public function santri()
    {
        return $this->belongsTo(Santri::class)->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function scopeFilter($query, $keyword)
    {
        return $query->whereRelation('santri', 'name', 'like', '%' . $keyword . '%')->orWhereRelation('user', 'name', 'like', '%' . $keyword . '%');
    }

    public static function getIzinSakitSantriBerlaku()
    {
        $izinSakitSantris = [];

        $dataizinSakitSantris = IzinSakitSantri::where('tanggal', date('Y-m-d', time()))->get();

        foreach ($dataizinSakitSantris as $dataIzinSakit) {
            array_push($izinSakitSantris, $dataIzinSakit->santri_id);
        }

        return $izinSakitSantris;
    }
}
