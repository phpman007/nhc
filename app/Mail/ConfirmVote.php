<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmVote extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
	    if(\Auth::user()->groupId == 1) {
		    $url = 'http://192.168.200.1/mock/app_ex2019_05_21_001_3564.pdf';
	    } else {
		    $url = 'http://192.168.200.1/mock/app_ex2019_05_21_002_3566.pdf';
	    }
        return $this->subject('ยืนยันการใช้สิทธิ์')
        ->view('mail.confirm-vote')->attach($url);
    }
}
