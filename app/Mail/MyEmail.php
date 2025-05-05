<?php

namespace App\Mail;

use App\Models\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
class MyEmail extends Mailable
{
    private $get_client = null;

    public function __construct($get_client)
    {
        // parent::__construct();
        $this->get_client = $get_client;
    }

    public function build()
    {
        // Log::info("Email checking: " . print_r($this->get_client, true));

        return $this->subject('Ante Air - Welcome to Ante Air')
            ->with('email', $this->get_client['email'])
            ->with('first_name', $this->get_client['first_name'])
            ->view('Emails.Client_email', $this->viewData);
    }


}
