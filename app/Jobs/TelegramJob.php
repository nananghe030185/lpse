<?php

namespace App\Jobs;

use App\Models\Outbox;
use App\Models\Testing;
use App\Models\UserProfile;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Telegrambot\Telegram;

class TelegramJob implements ShouldQueue
{
    use Queueable;

    protected $telegramObj;
    /**
     * Create a new job instance.
     */
    public function __construct($telegramToken)
    {
        // $bot_token = '7166262778:AAHKVjRntn6C4GFwATEEAJzr0XNjvr-Kuvg';
        $this->telegramObj = new Telegram($telegramToken);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->autoResponTelegram();

        $this->sendOutbox('telegram');
    }

    public function autoResponTelegram()
    {
        // $bot_token = '7166262778:AAHKVjRntn6C4GFwATEEAJzr0XNjvr-Kuvg';
        // $this->telegramObj = new Telegram($bot_token);

        // Get all the new updates and set the new correct update_id
        $req = $this->telegramObj->getUpdates();

        for ($i = 0; $i < $this->telegramObj->UpdateCount(); $i++) {
            // You NEED to call serveUpdate before accessing the values of message in Telegram Class
            $this->telegramObj->serveUpdate($i);
            $text = $this->telegramObj->Text();
            $chat_id = $this->telegramObj->ChatID();

            if ($text == '/start') {
                $reply = 'Selamat Datang di Bot LPSE Indonesia, Silahkan ketik /token untuk mendapat Token ID Telegram anda';
                $content = ['chat_id' => $chat_id, 'text' => $reply];
                $this->telegramObj->sendMessage($content);
            }
            if ($text == '/token') {
                $reply = 'Token ID Telegram anda : ' . $chat_id;
                $content = ['chat_id' => $chat_id, 'text' => $reply];
                $this->telegramObj->sendMessage($content);
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
