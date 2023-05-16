<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMailRFI extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($name, $jumlah_rfi, $tanggal_rfi)
    {
        $this->name = $name;
        $this->jumlah_rfi = $jumlah_rfi;
        $this->tanggal_rfi = $tanggal_rfi;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Request For Inspection - Exodus',
        );
    }

    public function content()
    {
        return new Content(
            view: 'mainline.mainline_mail.send-rfi',
            with: [
                'name' => $this->name,
                'jumlah_rfi' => $this->jumlah_rfi,
                'tanggal_rfi' => $this->tanggal_rfi,
            ],
        );
    }

    public function attachments()
    {
        return [];
    }
}