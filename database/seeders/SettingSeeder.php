<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create(['key' => 'message_notifikasi', 'value' => 'Berikut Data LPSE yang baru tayang pada {{tanggal}}: \n{{lpse}}']);
        Setting::create(['key' => 'item_per_page', 'value' => '20']);
        Setting::create(['key' => 'harga_personal', 'value' => '350000']);
        Setting::create(['key' => 'harga_corporate', 'value' => '1200000']);
        Setting::create(['key' => 'harga_special', 'value' => '1500000']);
        Setting::create(['key' => 'durasi_personal', 'value' => '90']);
        Setting::create(['key' => 'durasi_corporate', 'value' => '360']);
        Setting::create(['key' => 'durasi_special', 'value' => '450']);
        Setting::create(['key' => 'bri_client_id', 'value' => 'Pk5eocJANT9AcpIbekbSgaH3wa2Zes8r']);
        Setting::create(['key' => 'bri_client_secret', 'value' => 'AVjGGnGOoUsOnA9W']);
        Setting::create(['key' => 'bri_account_no', 'value' => '210501003757507']);
        Setting::create(['key' => 'bri_access_token', 'value' => 'gaWC2xpxG1fNMGvQPvSTnrR1E7mg']);
        Setting::create(['key' => 'no_whatsapp_sender', 'value' => '087821996965']);
        Setting::create(['key' => 'logo_image', 'value' => 'xxx']);
        Setting::create(['key' => 'persen_komisi', 'value' => '10']);
        Setting::create(['key' => 'reminder_expired_day', 'value' => '14']);
        Setting::create(['key' => 'masa_percobaan', 'value' => '14']);
        Setting::create(['key' => 'token_telegram', 'value' => '7166262778:AAHKVjRntn6C4GFwATEEAJzr0XNjvr-Kuvg']);
        Setting::create(['key' => 'scrape_item_tender', 'value' => '100']);
        Setting::create(['key' => 'scrape_item_lelang', 'value' => '100']);
        Setting::create(['key' => 'scrape_item_swakelola', 'value' => '100']);
    }
}
