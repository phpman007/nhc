<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class approveMail extends Mailable
{
    use Queueable, SerializesModels;
    public $title,$firstname,$lastname,$statusid,$group,$reason,$pdfpath,$subject,$groupid,$province,$section;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title,$firstname,$lastname,$statusid,$group,$reason,$pdfpath,$subject,$groupid,$province,$section)
    {
        $this->title = $title;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->statusid = $statusid;
        $this->group = $group;
        $this->reason = $reason;
        $this->pdfpath = $pdfpath;
        $this->subject = $subject;
        $this->groupid = $groupid;
        $this->province = $province;
        $this->section = $section;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->from('example@example.com')
        return $this->subject("แจ้งผลประกาศบัญชีรายชื่อ")
        ->attach(public_path($this->pdfpath))
        ->view('mail.emailApprove',
        ['title'    => $this->title,
        'firstname' => $this->firstname,
        'lastname'  => $this->lastname,
        'statusid'  => $this->statusid,
        'group'     => $this->group,
        'reason'    => $this->reason,
        'pdfpath'   => $this->pdfpath,
        'subject'   => $this->subject,
        'groupid'   => $this->groupid,
        'province'  => $this->province,
        'section'   => $this->section
        ]);

        // ->view('mail.emailApprove', ['title'  => $this->title,'firstname' => $this->firstname,'lastname'  => $this->lastname]);

    }
}
