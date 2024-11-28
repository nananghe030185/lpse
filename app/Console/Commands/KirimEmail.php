<?php

namespace App\Console\Commands;

use App\Mail\MailMessage;
use App\Models\Outbox;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

use function PHPUnit\Framework\isNull;

class KirimEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:kirim-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Untuk mengirim email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $outboxs = Outbox::where([
            'state' => 0,
            'channel' => 'email'
        ]);

        foreach ($outboxs->get() as $outbox) {
            $user_id = $outbox->user_id;
            $user = User::where('id', $user_id)->first();

            $pesan = [
                'text' => $outbox->pesan,
                'name' => $user->name,
                'user_id' => $user_id,
                'email' => $user->email,
                'tanggal' => Carbon::now()->format('d M Y')
            ];

            if (is_null(Mail::to($user, $user->name)->send(new MailMessage($pesan)))) {
                // Pengiriman Gagal maka update status outbox menjadi gagal
                $outbox->update(['state' => -1]);
            } else {
                // Pesan terkirim update jadi sukses
                $outbox->update(['state' => 1]);
            }
        }
    }
}
