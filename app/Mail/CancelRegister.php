<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Model\Frontend\Member;
class CancelRegister extends Mailable
{
    use Queueable, SerializesModels;

    public $member, $groups, $step;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Member $member, $groups, $step)
    {
       $this->member = $member;
       switch ($groups) {
             case '1':
                  $this->groups = "ผู้ทรงคุณวุฒิ สมัครเป็นกรรมการสุขภาพแห่งชาติ";
                   break;
             case '2':
                  $this->groups = "ผู้แทนองค์กรภาคเอกชน ขอขึ้นทะเบียนองค์กรภาคเอกชน";
                   break;
             case '3':
                 $this->groups = "ผู้แทนองค์กรภาคเอกชน สมัครเป็นกรรมการสุขภาพแห่งชาติ";
                  break;
             default:
                 $this->groups = "ผู้แทนองค์กรภาคเอกชน สมัครเป็นกรรมการสุขภาพแห่งชาติ";
                   break;
       }
       $this->step = $step;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('แจ้งสถานะการสมัครกรรมการสุขภาพแห่งชาติ')->view('mail.cancelRegister', ['group' => $this->groups, 'step' => $this->step, 'member' => $this->member]);
    }
}
