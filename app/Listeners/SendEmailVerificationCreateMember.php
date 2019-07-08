<?php

namespace App\Listeners;

use App\Events\FinishRegister;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailVerificationCreateMember
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
     * @param  CreateMember  $event
     * @return void
     */
    public function handle(FinishRegister $event)
    {

    }
}
