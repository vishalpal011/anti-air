<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Scheduled_pickup extends Mailable
{
    use Queueable, SerializesModels;
    public $update_booking;
    /**
     * Create a new message instance.
     */
    public function __construct($update_booking)
    {
        $this->update_booking = $update_booking;
    }

    public function build()
    {
        // Log::info("Email checking: " . print_r($this->get_client, true));

        return $this->subject('Scheduled Pickup')
        ->view('Emails.scheduled_pickup')
        ->with(['bookingId' => $this->update_booking]);
    }
}
