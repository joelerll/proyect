<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Config;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(User $User, $token)
    {
        $this->User = $User;
        $this->token = $token;
    }

    public function build()
    {
        return $this->view('forgot')->with([
            'names' => $this->User->names,
            'token' => $this->token,
            'base_url' => Config::get('app.url')
        ]);
    }
}
