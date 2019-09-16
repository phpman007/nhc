<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class success extends Mailable
{
    use Queueable, SerializesModels;
    protected $path, $groups;
    public $view;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($path,$groups)
    {
        $this->path = $path;

        switch ($groups) {
             case '1':
                  $this->groups 	= "ผู้ผู้ทรงคุณวุฒิ สมัครเป็นกรรมการสุขภาพแห่งชาติ";
			$this->view 	= 'mail.RegisterSuccess';
                   break;
             case '2':
                  $this->groups 	= "ผู้แทนองค์กรภาคเอกชน ขอขึ้นทะเบียนองค์กรภาคเอกชน";
			$this->view 	= 'mail.ngoRegisterSuccess';
			$this->path 	=  url('gen-word/'. \Auth::user()->id.'.doc');
			// dd($this->path);
                  break;
             case '3':
                 $this->groups 	= "ผู้แทนองค์กรภาคเอกชน สมัครเป็นกรรมการสุขภาพแห่งชาติ";
		     $this->view 		= 'mail.RegisterSuccess';
                  break;
             default:
                 $this->groups 	= "ผู้แทนองค์กรภาคเอกชน สมัครเป็นกรรมการสุขภาพแห่งชาติ";
		     $this->view 		= 'mail.RegisterSuccess';
                   break;
       }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->path != null)
        return $this->subject('ลงทะเบียนเรียบร้อยแล้ว')
        ->view($this->view, ['group'=>$this->groups])->attach($this->path);
    }
}
