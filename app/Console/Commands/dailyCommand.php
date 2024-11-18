<?php

namespace App\Console\Commands;

use App\AppLpse;
use App\Models\Lpse;
use App\Models\Outbox;
use App\Models\Satker;
use App\Models\Setting;
use App\Models\Swakelola;
use App\Models\User;
use App\Models\UserProfile;
use Carbon\Carbon;
use Illuminate\Console\Command;

class dailyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:daily-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Perintah yang dijalankan setiap hari jam 12 malam';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Downgrade User expired
        $this->downgradeUser();

        // Reminder expired
        $this->reminder();

        // Update Scrape buat di jalankan

        $this->updateScrapeState();
    }

    /**
     * Downgrade Masa Berlaku User Jika Tidak telah expired
     * Di Downgrade menjadi Registered kecuali super admin
     */
    public function downgradeUser()
    {
        $userProfiles = UserProfile::get(['user_id', 'masa_berlaku']);
        foreach ($userProfiles as $profile) {

            if ($profile->masa_berlaku < now()->format('Y-m-d H:i:s')) {
                $user = User::where('id', $profile->user_id);
                if ($user->first()->group_id > 1) {
                    $user->update([
                        'group_id' => 2
                    ]);
                }
            }
        }
    }


    /**
     * Reminder expired member
     */
    public function reminder()
    {
        $daybefore = AppLpse::setting('reminder_expired_day');
        $userProfiles = UserProfile::all();
        $now = new Carbon();
        foreach ($userProfiles as $profile) {
            if ($profile->user->group_id > 1) {
                if ($now->diffInDays($profile->masa_berlaku) == $daybefore) {
                    // Kirim Notif reminder ke outbox
                    // channel email
                    Outbox::create([
                        'pesan' => 'Masa Berlaku Keanggotaan anda akan berakhir dalam ' . $daybefore . ' hari, silahkan lakukan pembayaran untuk tetap menikmati fitur dari ' . config('app.name'),
                        'user_id' => $profile->user_id,
                        'channel' => 'telegram'
                    ]);

                    Outbox::create([
                        'pesan' => 'Masa Berlaku Keanggotaan anda akan berakhir dalam ' . $daybefore . ' hari, silahkan lakukan pembayaran untuk tetap menikmati fitur dari ' . config('app.name'),
                        'user_id' => $profile->user_id,
                        'channel' => 'email'
                    ]);

                    Outbox::create([
                        'pesan' => 'Masa Berlaku Keanggotaan anda akan berakhir dalam ' . $daybefore . ' hari, silahkan lakukan pembayaran untuk tetap menikmati fitur dari ' . config('app.name'),
                        'user_id' => $profile->user_id,
                        'channel' => 'whatsapp'
                    ]);
                }
            }
        }
    }

    public function updateScrapeState()
    {
        Lpse::where('id', '>', '0')->update(['scrape' => false]);
        Satker::where('id', '>', '0')->update(['lelang' => false, 'swakelola' => false]);
    }
}
