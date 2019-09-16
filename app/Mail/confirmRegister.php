<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Model\Frontend\Member;
class confirmRegister extends Mailable
{
    use Queueable, SerializesModels;
    public $member;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($member)
    {
	    $this->member = $member;
	    $this->member->verfiy_register_confirm = str_random(50);
	    $this->member->save();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      	return $this->subject('คอนเฟิร์มลงทะเบียน')
		->view('mail.confirmRegister',
		[
			'url' => url('confirm/register/'. $this->member->verfiy_register_confirm)

		]);
    }
}
