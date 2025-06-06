<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WizytaZarejestrowanaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;

   
    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    
    public function build()
    {
        return $this->subject('Twoja wizyta oczekuje na potwierdzenie')
                ->view('emails.wizyta_zarejestrowana')
                ->with([
                    'appointment' => $this->appointment, ]);
    }
}
