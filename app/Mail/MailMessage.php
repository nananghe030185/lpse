<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use illuminate\support\Str;

class MailMessage extends Mailable
{
    use Queueable, SerializesModels;
    protected $pesan;
    /**
     * Create a new message instance.
     */
    public function __construct($pesan)
    {
        $pesan['text'] = Str::replace('{{tanggal}}', Carbon::now()->format('d M Y'), $pesan['text']);
        $pesan['text'] = Str::replace('{{nama}}', $pesan['name'], $pesan['text']);
        $pesan['text'] = Str::replace('{{email}}', $pesan['email'], $pesan['text']);
        $pesan['text'] = Str::replace('{{user_id}}', $pesan['user_id'], $pesan['text']);

        $this->pesan = $pesan['text'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'LPSE Indonesia',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.MailMessage',
            with: [
                'pesan' => $this->pesan
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
