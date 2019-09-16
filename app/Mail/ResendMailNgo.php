<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Model\Frontend\Member;
class ResendMailNgo extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Member $member)
    {
	    $this->user = $member;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         if($this->user->groupId == 1) {
                  $path = "pdf/professional-merge/". $this->user->detail->docId .".pdf";
         } else {
                  $path = "pdf/ngo-merge/". $this->user->detail->docId .".pdf";
         }
        return $this->subject('ขอส่งไฟล์ใบสมัครเป็นกรรมการสุขภาพแห่งชาติของท่าน')
        ->view('mail.resend-ngo-1', ['user'=> $this->user])->attach($path);
    }
}
