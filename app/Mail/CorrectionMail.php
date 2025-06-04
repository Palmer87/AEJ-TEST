<?php

namespace App\Mail;

use App\Models\Correction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CorrectionMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct( public Correction $correction)
    {
        //
    }

public function build()
{
    return $this->view('projets.send_correction')
        ->subject('Demande de correction');

}
}
