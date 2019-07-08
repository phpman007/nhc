<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class approveMail extends Mailable
{
    use Queueable, SerializesModels;
    public $group,$list;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($group,$list)
    {
        $this->group = $group;
        $this->list = $list;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('example@example.com')
        ->subject('ผลการอนุมัติ')
        ->view('mail.professionail');
    }
}
