<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoinSantri extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function santri()
    {
      return $this->belongsTo(Santri::class)->withTrashed();
    }

    public function scopeFilter($query, $keyword)
    {
      return $query->whereRelation('santri', 'name', 'like', '%' . $keyword . '%');
    }

    public static function kalkulasiPoin()
    {
      $poins = PoinSantri::all();
      $pengurangans = PenguranganPoin::all();
      foreach ($poins as $poin) {
        $kurang = 0;
        foreach ($pengurangans as $pengurangan) {
          if ($pengurangan->santri_id == $poin->santri_id) {
            $kurang += $pengurangan->poin_dikurangi;
          }
        }

        $jumlah = $poin->poin_formal + $poin->poin_madin + $poin->poin_mmq + $poin->poin_asrama + $poin->poin_ekstrakurikuler + $poin->poin_ibadah + $poin->poin_pelanggaran - $kurang;
        $poin->update(['jumlah' => $jumlah, 'poin_dikurangi' => $kurang]);
      }
    }
}
