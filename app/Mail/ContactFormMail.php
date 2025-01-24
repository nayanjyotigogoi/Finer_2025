<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;

    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    public function build()
    {
        return $this->view('emails.contact_form')
            ->from( $this->formData['email'] )
                    ->subject('New Contact Form Submission')
                    ->with('formData', $this->formData);
    }
}
