<?php

namespace App\Listeners;

use App\Events\CancelRegisterEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogEmail
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
        \Log::info($event->eventMessage);
    }
}
