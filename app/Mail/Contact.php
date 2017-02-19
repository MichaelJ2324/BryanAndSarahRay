<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
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
        $this->userMessage = nl2br($message);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->name.' Reaching Out via Website';
        return $this->subject($subject)->from($this->email)->view('emails.contact')->with([
            'name' => $this->name,
            'user_message' => $this->userMessage
        ]);
    }
}
