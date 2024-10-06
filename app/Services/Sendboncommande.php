<?php
namespace App\Services;
use Mail;

class Sendboncommande
{
    public function Sendboncommande($data, $filePath, $recipient)
    {
        Mail::send('emails.boncommande', ['data' => $data], function ($message) use ($recipient, $filePath) {
            $message->to($recipient)->subject('Bon de commande');
            $message->attach($filePath);
        });
    }
}
