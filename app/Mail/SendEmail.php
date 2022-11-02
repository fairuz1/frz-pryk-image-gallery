<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build() {
        return $this->subject('Testing Kirim Email')
                    ->view('emails.sendemail');
    }

    // public function envelope() {
    //     return new Envelope(
    //         subject: 'Send Email',
    //     );
    // }

    // public function content() {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    // public function attachments() {
    //     return [];
    // }
}
