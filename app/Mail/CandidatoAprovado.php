<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Candidato;

class CandidatoAprovado extends Mailable
{
    use Queueable, SerializesModels;

    public $candidato;

    public function __construct(Candidato $candidato)
    {
        $this->candidato = $candidato;
    }

    public function build()
    {
        return $this->subject('Você foi aprovado! - Missão Espacial')
                    ->view('emails.aprovado');
    }
}