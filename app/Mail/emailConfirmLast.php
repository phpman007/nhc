<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Model\Frontend\Member;
class emailConfirmLast extends Mailable
{
    use Queueable, SerializesModels;
	protected $code;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code)
    {
	    $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

      	return $this->subject('คอนเฟิร์มลงทะเบียน รับรหัสลงคะแนน')
		->view('mail.confirmRegisterLast', ['code' => $this->code]);
    }
}
