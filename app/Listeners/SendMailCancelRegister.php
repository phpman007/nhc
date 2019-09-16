<?php

namespace App\Listeners;

use App\Events\CancelRegisterEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\CancelRegister;
class SendMailCancelRegister
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CancelRegisterEvent  $event
     * @return void
     */
    public function handle(CancelRegisterEvent $event)
    {
        Mail::to($event->member->email)->send(new CancelRegister($event->member, $this->groups, $this->step));
    }
}
