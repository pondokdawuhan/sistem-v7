<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


Schedule::call('\App\Http\Controllers\CronjobController@hitungHariHaid')->daily();
Schedule::call('\App\Http\Controllers\CronjobController@cekHaidSantri')->hourly();
Schedule::call('\App\Http\Controllers\CronjobController@notifMengajar')->dailyAt('05:00');