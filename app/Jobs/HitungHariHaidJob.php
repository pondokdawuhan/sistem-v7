<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\HaidSantri;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class HitungHariHaidJob implements ShouldQueue
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
      $haids = HaidSantri::where('watching_bot', true)->get();

      foreach ($haids as $haid) {
        $now = Carbon::now();
        $waktuHaid = Carbon::parse($haid->tanggal_mulai);
        $haid->update([
          'lama_keluar_darah' => $waktuHaid->diffInDays($now) - 1
        ]);
      }
    }
}
