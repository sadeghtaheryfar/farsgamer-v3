<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subject,$text;
    public function __construct($subject,$text)
    {
        $this->text = $text;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		
        $data = [
            'text' => $this->text,
            'name' => 'فارس گیمر',
            'subject'=> $this->subject,
        ];
        $email = $this->from('fortnit@farsgamer.com','فارس گیمر');
		
        return $email->subject($this->subject)->view('emails.event',$data);
    }
}
