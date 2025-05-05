<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminPasswordreset extends Mailable
{
    use Queueable, SerializesModels;

    private $get_client = null;

    public function __construct($get_client)
    {
        // parent::__construct();
        $this->get_client = $get_client;
    }

    public function build()
    {
        // Log::info("Email checking: " . print_r($this->get_client, true));

        return $this->subject('Ante Air - Admin Password Reste')
            ->with('otp', $this->get_client['otp'])
            ->with('email', $this->get_client['email'])
            ->view('Emails.Adminpassword-reset', $this->viewData);
    }
}
