<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Thankyou extends Mailable
{
    use Queueable, SerializesModels;

    protected $email;

    protected $name;

    protected $userMessage;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$name,$message)
    {
        $this->email = $email;
        $this->name = $name;
        $this->userMessage = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Thanks for reaching out!')->view('emails.thankyou')->with([
            'name' => $this->name,
            'user_message' => $this->userMessage
        ]);
    }
}
