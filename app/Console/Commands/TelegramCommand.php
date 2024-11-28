<?php

namespace App\Console\Commands;

use App\Models\Outbox;
use App\Models\Testing as ModelsTesting;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Console\Command;
use Telegrambot\Telegram;


class TelegramCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:telegram-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $telegramObj;

    // public function __construct()
    // {
    //     $bot_token = '7166262778:AAHKVjRntn6C4GFwATEEAJzr0XNjvr-Kuvg';
    //     $this->telegramObj = new Telegram($bot_token);
    // }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $this->autoResponTelegram();

        // Downgrade Group ID User
        $this->downgradeUser();

        // Send Outbox Telegram
        $this->sendOutbox('telegram');
    }

    // public function autoResponTelegram()
    // {
    //     $bot_token = '7166262778:AAHKVjRntn6C4GFwATEEAJzr0XNjvr-Kuvg';
    //     $this->telegramObj = new Telegram($bot_token);

    //     // Get all the new updates and set the new correct update_id
    //     $req = $this->telegramObj->getUpdates();

    //     for ($i = 0; $i < $this->telegramObj->UpdateCount(); $i++) {
    //         // You NEED to call serveUpdate before accessing the values of message in Telegram Class
    //         $this->telegramObj->serveUpdate($i);
    //         $text = $this->telegramObj->Text();
    //         $chat_id = $this->telegramObj->ChatID();

    //         if ($text == '/start') {
    //             $reply = 'Selamat Datang di Bot LPSE Indonesia, Silahkan ketik /token untuk mendapat Token ID Telegram anda';
    //             $content = ['chat_id' => $chat_id, 'text' => $reply];
    //             $this->telegramObj->sendMessage($content);
    //         }
    //         if ($text == '/token') {
    //             $reply = 'Token ID Telegram anda : ' . $chat_id;
    //             $content = ['chat_id' => $chat_id, 'text' => $reply];
    //             $this->telegramObj->sendMessage($content);
    //         }
    //     }
    // }

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
     * Kirim pesan Outbox
     */
    public function sendOutbox($channel)
    {
        // Jika Pesan channel Telegram
        if ($channel == 'telegram') {
            $messages = Outbox::where([
                'state' => 0,
                'channel' => $channel
            ]);

            foreach ($messages->get() as $key => $message) {

                $profile = UserProfile::where('user_id', $message->user_id)->first();
                if ($profile->telegram) {
                    $content = ['chat_id' => $profile->telegram, 'text' => $message->pesan];
                    $this->telegramObj->sendMessage($content);

                    // Update Outbox jadi sukses
                    $messages->update(['state' => 1]);
                } else {
                    // Update Outbox jadi gagal
                    $messages->update(['state' => -1]);
                }

                // Batasi 5 Pesan per detik
                if ($key == 4) {
                    break;
                }
            }
        }
    }
}
