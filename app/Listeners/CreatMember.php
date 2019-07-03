<?php

namespace App\Listeners;

use App\Events\CreateMember;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;
class CreatMember
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
     * @param  =CreateMember  $event
     * @return void
     */
    public function handle(CreateMember $event)
    {
        $member = $event->member;

        $member->save();

        Auth::login($member);

        return $member;
    }
}
