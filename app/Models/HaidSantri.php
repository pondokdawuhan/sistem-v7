<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HaidSantri extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['santri'];


    public function santri()
    {
        return $this->belongsTo(Santri::class)->withTrashed();
    }

    public function scopeFilter($query, $keyword)
    {
        return $query->whereRelation('santri', 'name', 'like', '%' . $keyword . '%');
    }

    public static function santriHaid()
    {
        $santris = HaidSantri::where('status', 'Haid')->get();

        $santriHaid = [];
        foreach ($santris as $santri) {
            array_push($santriHaid, $santri->santri_id);
        }

        return $santriHaid;
    }

    public static function santriIstihadloh()
    {
        $santris = HaidSantri::where('status', 'Istihadloh')->get();

        $santriIstihadloh = [];
        foreach ($santris as $santri) {
            array_push($santriIstihadloh, $santri->santri_id);
        }

        return $santriIstihadloh;
    }

    public static function generateLaporanHaid()
    {
      $santris = Santri::all();

      foreach ($santris as $santri) {
        if ($santri->haidSantri) {
          $santri->raporSantri->update([
            'lama_haid' => $santri->haidSantri->lama_keluar_darah,
            'status_haid' => $santri->haidSantri->status
          ]);
        }
      }
    }
}
