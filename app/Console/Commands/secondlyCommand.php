<?php

namespace App\Console\Commands;

use App\AppLpse;
use App\Models\Outbox;
use App\Models\Setting;
use App\Models\UserProfile;
use Illuminate\Console\Command;
use Telegrambot\Telegram;

class secondlyCommand extends Command
{
    protected $tokentelegram;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:secondly-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Perintah yang dijalankan setiap detik';


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->setTokenTelegram();

        // Read inbox telegram
        $this->autoResponTelegram();

        //Kirim Outbox
        $this->sendOutbox('telegram');
    }

    protected function setTokenTelegram()
    {
        $this->tokentelegram = AppLpse::setting('token_telegram');
    }

    public function autoResponTelegram()
    {
        $telegram = new Telegram($this->tokentelegram);

        // Get all the new updates and set the new correct update_id
        $req = $telegram->getUpdates();

        for ($i = 0; $i < $telegram->UpdateCount(); $i++) {
            // You NEED to call serveUpdate before accessing the values of message in Telegram Class
            $telegram->serveUpdate($i);
            $text = $telegram->Text();
            $chat_id = $telegram->ChatID();

            if ($text == '/start') {
                $reply = 'Selamat Datang di Bot LPSE Indonesia, Silahkan ketik /token untuk mendapat Token ID Telegram anda';
                $content = ['chat_id' => $chat_id, 'text' => $reply];
                $telegram->sendMessage($content);
            }
            if ($text == '/token') {
                $reply = 'Token ID Telegram anda : ' . $chat_id;
                $content = ['chat_id' => $chat_id, 'text' => $reply];
                $telegram->sendMessage($content);
            }
        }
    }

    /**
     * Kirim pesan Outbox
     */
    public function sendOutbox($channel)
    {
        $telegram = new Telegram($this->tokentelegram);

        // Jika Pesan channel Telegram
        if ($channel == 'telegram') {
            $messages = Outbox::where([
                'state' => 0,
                'channel' => $channel
            ]);

            foreach ($messages->get() as $key => $message) {

                $profile = UserProfile::where('user_id', $message->user_id)->first();
                if ($profile->telegram) {
                    $content = ['chat_id' => $profile->telegram, 'text' => $message->pesan, 'parse_mode' => 'HTML'];
                    $telegram->sendMessage($content);

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
