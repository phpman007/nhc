<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailFirstStep extends Mailable
{
    use Queueable, SerializesModels;
    public $email, $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email , $password)
    {
          $this->email = $email;
          $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('ลงทะเบียนขั้นที่ 1 เรียบร้อยแล้ว')
        ->view('mail.sendfirststep', ['email' => $this->email, 'password' => $this->password]);
    }
}
