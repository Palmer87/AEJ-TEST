<?php

namespace App\Mail;

use App\Models\Projet;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Storage;

class ProjetStatutMail extends Mailable
{
    use Queueable, SerializesModels;

    public $projet;
    public $status;
    public $justification;
    //public $fileName;


    // si rejet

    public function __construct( Projet $projet, $status, $justification = null, )
    {
        $this->projet = $projet;
        $this->status = $status;
        $this->justification = $justification;
        ;
        //dd($this->projet);



    }

    public function build()
    {
       if ($this->status === 'rejeté') {
        $pdf = Pdf::loadView('pdf.decision', [
            'projet' => $this->projet,
            'status' => $this->status,
            'date' => now()->format('d/m/Y'),
            'justification' => $this->justification,
        ]);
        $fileName = 'decision_projet_'. $this->projet->titre. '.pdf';
        Storage::put("public/pdfs/$fileName", $pdf->output());
    }else{
        $pdf = Pdf::loadView('pdf.decision', [
            'projet' => $this->projet,
           'status' => $this->status,
            'date' => now()->format('d/m/Y'),
            'justification' => $this->justification,
        ]);
    }
        $fileName = 'decision_projet_'. $this->projet->titre. '.pdf';
        Storage::put("public/pdfs/$fileName", $pdf->output());

        return $this->subject('Mise à jour du projet : '.$this->projet->titre)
                    ->markdown('emails.projets.statut')
                    ->with([
                        'projet' => $this->projet,
                        'statut' => $this->status,
                        'justification' => $this->justification,
                    ])->attachData($pdf->output(), $fileName);

    }
}
