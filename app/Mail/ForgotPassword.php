<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@alexus.com.au')
                    ->subject("Password Reset")
                    ->view('emails.ForgotPasswordEmail')->with([
                    'firstname' => $this->user->first_name,
                    'token' => $this->user->forgotpassword_token,
                    'APP_URL' =>env('APP_URL')
        ]);
    }
}
