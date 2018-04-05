<?php

namespace App\Mail;

use App\User;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;

class VerificationEmail extends Mailable
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $confirm_url = $this->getTemporarySignedRoute();
        return $this->view('mail.verification', compact('confirm_url'));
    }

    public function getTemporarySignedRoute(): string
    {
        $expiration = now()->addSeconds(60);
        $parameters = ['user' => $this->user->id];

        return URL::temporarySignedRoute('confirm-email', $expiration, $parameters);
    }
}
