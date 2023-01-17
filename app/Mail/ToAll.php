<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ToAll extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $content;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $subject, string $content, string $name)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('test@example.com')
            ->subject($this->subject)
            ->view('mails.all');
    }
}
