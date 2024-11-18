<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule as FacadesSchedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// // Schedul Secondly untuk mengeksekusi autorespon telegram dan mengirim pesan telegram
// FacadesSchedule::command('app:secondly-command')->everySecond();

// FacadesSchedule::command('app:kirim-email')->everyFiveSeconds();
// ===============================================
// YANG BELUM ADA TINGGAL KIRIM PESAN VIA WHATSAPP
//================================================


// Schedule Daily
// FacadesSchedule::command('app:daily-command')->dailyAt('00:00');

// // update data tender
FacadesSchedule::command('app:tender-command')->everyMinute()->runInBackground();

//// Update data lelang (SIRUP)
// FacadesSchedule::command('app:lelang-command')->dailyAt('01:00')->runInBackground();

//// Update data Swakelola (SIRUP)
// FacadesSchedule::command('app:swakelola-command')->dailyAt('01:00')->runInBackground();
