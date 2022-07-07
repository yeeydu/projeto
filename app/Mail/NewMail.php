<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $subject;
    public $viewtoSend;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$subject, $viewtoSend)
    {
        $this-> data        = $data;
        $this-> subject     = $subject;
        $this-> viewtoSend  = $viewtoSend;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->view($this->viewtoSend)->with('data', $this->data);
    }
}
