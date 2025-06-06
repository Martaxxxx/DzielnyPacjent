<?php

namespace App\Mail;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WizytaOdrzuconaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;

    
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

   
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Wizyta została odrzucona',
        );
    }

  
    public function content(): Content
    {
        return new Content(
            view: 'emails.wizyta_odrzucona',
        );
    }

    /**
     * 
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
