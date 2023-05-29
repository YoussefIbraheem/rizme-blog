<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $mailResponse , $repliedToMesageData;  
    public function __construct($mailResponse , $repliedToMesageData)
    {
        $this->mailResponse = $mailResponse ; 
        $this->repliedToMesageData = $repliedToMesageData ;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "RE:".$this->repliedToMesageData['subject'],
        );
    }


    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.user-mail',
            with:[
                'name'=>$this->repliedToMesageData['name'],
                'subject'=>$this->repliedToMesageData['subject'],
                'email'=>$this->mailResponse['body']
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
