<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Confirmedcommande extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfContent;
    public $identification_boncommande;
    public $user;

    /**
     * Create a new message instance.
     *
     * @param string $pdf
     * @param int $IdBoncommande
     */
    public function __construct($pdfContent, $user, $identification_boncommande)
    {
        $this->pdfContent = $pdfContent;
        $this->identification_boncommande = $identification_boncommande;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreplay@richkoff.ci', 'Service commercial')
            //->cc('noelkini1@gmail.com') // Remplacez par votre adresse email
            ->subject('Commande')
            ->markdown('mails.confirmedcommande')
            ->attachData($this->pdfContent, $this->identification_boncommande . '.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
