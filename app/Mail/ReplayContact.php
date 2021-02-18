<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplayContact extends Mailable
{
    use Queueable, SerializesModels;
    protected $message;
    protected $replay;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message,$replay)
    {
        $this->message=$message;
        $this->replay=$replay;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $contactmessage=$this->message;
        dd($contactmessage);
        $replay=$this->replay;
        return $this->to($contactmessage->email)
            ->view('back-end.mails.reply-message',compact('contactmessage','replay'));
    }
}