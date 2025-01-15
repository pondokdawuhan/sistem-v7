<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiSholat extends Model
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

    public function lembaga()
    {
      return $this->belongsTo(Lembaga::class)->withTrashed();
    }

    public function scopeFilter($query, $keyword)
    {
        return $query->whereRelation('santri', 'name', 'like', '%' . $keyword . '%');
    }

    public static function generateLaporanAlpha()
    {
      $sekarang = PresensiSholat::where('keterangan', 'A')->whereYear('created_at', date('Y', time()))->whereMonth('created_at', date('n', time()))->get();
      $kemarin = PresensiSholat::where('keterangan', 'A')->whereYear('created_at', date('Y', time()))->whereMonth('created_at', date('n', time()) - 1)->get();
            
      $santris = Santri::all();

      foreach ($santris as $santri) {
        $alphaSekarang = 0;
        $alphaKemarin = 0;
        
        foreach ($sekarang as $skr) {
          if ($skr->santri_id == $santri->id) {
            $alphaSekarang += 1;
          }
        }

        foreach ($kemarin as $kmr) {
          if ($kmr->santri_id == $santri->id) {
            $alphaKemarin += 1;
          }
        }
        
        $santri->raporSantri->update([
          'alpha_sholat_kemarin' => $alphaKemarin,
          'alpha_sholat_sekarang' => $alphaSekarang
        ]);
      }
    }
}
