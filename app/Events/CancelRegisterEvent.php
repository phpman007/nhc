<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Model\Frontend\Member;
class CancelRegisterEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $member, $eventMessage;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Member $member)
    {
          $this->member       = $member;

          $this->eventMessage = 'Cancenl Register email = '. $member->email ." , date = " .now()->format('Y-m-d H:i:s') ;
    }

}
