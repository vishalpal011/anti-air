<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\Clientevent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\MyEmail;

class SendEmailListenerClient
{

    public function handle(Clientevent $event)
    {
        $get_client = $event->get_client;

        if ($get_client['email'])
        {
            // Log::info("ETA TO is this " . $get_client['email']);

            try
            {
                \Mail::to($get_client['email'])->send(new MyEmail($get_client));
                // Log::info("Email sent successfully: " . print_r($get_client, true));
            } catch (\Exception $e) {
                Log::error("Failed to send email. Error: " . $e->getMessage());
            }
        } else {
            Log::error("Invalid data provided in the event");
        }
    }

}
