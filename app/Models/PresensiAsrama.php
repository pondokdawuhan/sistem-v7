<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiAsrama extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

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
      return $query->whereRelation('santri', 'name', 'like', '%' . $keyword . '%');
    }

    public static function generateLaporanAlpha()
    {
      $sekarang = PresensiAsrama::where('keterangan', 'A')->whereYear('created_at', date('Y', time()))->whereMonth('created_at', date('n', time()))->get();
      $kemarin = PresensiAsrama::where('keterangan', 'A')->whereYear('created_at', date('Y', time()))->whereMonth('created_at', date('n', time()) - 1)->get();
            
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
          'alpha_asrama_kemarin' => $alphaKemarin,
          'alpha_asrama_sekarang' => $alphaSekarang
        ]);
      }
    }
}
