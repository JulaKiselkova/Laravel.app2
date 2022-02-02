<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BingoMail extends Mailable
{
    use Queueable, SerializesModels;
    public $balance;
    public $test;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($balance)
    {
        $this->balance = $balance;
        $this->test = "hellooo";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('test@mail.com', 'Yulia')
            ->view('mails.bingo')
            ->with(['message2' => 'Mess text'])
            ->attach('https://static.wikia.nocookie.net/gravityfalls/images/4/47/S1e20_Waddles_brought_up.png/revision/latest?cb=20171029131123');
    }
}
