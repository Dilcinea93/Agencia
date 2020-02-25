<?php

namespace App\Mail;

use App\Classes\Email;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class contactMail extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $name;
    public $email;
    public $phone;
    public $comment;
    public function __construct($data)
    {
        //
        $this->name=$data['name'];
        $this->email=$data['email'];
        $this->phone=$data['phone'];
        $this->comment=$data['comment'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email')->subject('Nueva solicitud de ticket');
    }
}
