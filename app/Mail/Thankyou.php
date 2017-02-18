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

    protected $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$message)
    {
        $this->name = $name;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.thankyou')->with([
            'name' => $this->name,
            'message' => $this->message
        ]);
    }
}
