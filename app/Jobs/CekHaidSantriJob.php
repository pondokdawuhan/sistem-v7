<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\HaidSantri;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CekHaidSantriJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        
      // $now = Carbon::now();
      // $waktuHaid = Carbon::create(2024, 6, 19, 9, 59);

      // dd($waktuHaid->lessThanOrEqualTo($now));

      $haids = HaidSantri::where('watching_bot', true)->get();
      
      foreach ($haids as $haid) {
        
        switch ($haid->watching_table) {
          case 'tanggal_terakhir_suci':
            $now = Carbon::now();
            $waktuHaid = Carbon::parse($haid->tanggal_terakhir_suci);
            
            if($waktuHaid->diffInDays($now) > 15){
              $haid->update([
                'watching_table' => 'tanggal_maksimal',
                'status' => 'Haid'
              ]);
            }
            break;
          case 'tanggal_maksimal':
            $now = Carbon::now();
            $waktuHaid = Carbon::parse($haid->tanggal_maksimal);

            if ($waktuHaid->lessThanOrEqualTo($now)) {
              $haid->update([
                'watching_table' => null,
                'watching_bot' => false,
                'status' => 'Suci',
                'keluar_darah' => false,
                'tanggal_suci' => date('Y-m-d H:i:s', time()),
                'tanggal_terakhir_suci' => date('Y-m-d H:i:s', time()),
              ]);
            }
            break;
          case 'tanggal_terakhir_istihadloh':
            
            $now = Carbon::now();
            $waktuHaid = Carbon::parse($haid->tanggal_terakhir_istihadloh);

            if ($waktuHaid->lessThanOrEqualTo($now)) {
              $haid->update([
                'watching_table' => null,
                'tanggal_terakhir_istihadloh' => null,
                'watching_bot' => false,
                'status' => 'Suci',
                'keluar_darah' => false,
              ]);
            }
            break;
        }
      }
    }
}
