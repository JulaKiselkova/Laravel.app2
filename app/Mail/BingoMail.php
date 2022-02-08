<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use function Symfony\Component\Translation\t;

class BingoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $text;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($name, $text)
    {
        $this->name = $name;
        $this->text = $text;
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
            ->with([
                'name' => $this->name,
                'text' => $this->text,
                ])
            ->attach('https://static.wikia.nocookie.net/gravityfalls/images/4/47/S1e20_Waddles_brought_up.png/revision/latest?cb=20171029131123');
    }
}
