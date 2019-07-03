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
use Request;

class CreateMember
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $member;

    public function __construct(Member $member)
    {
        $this->member   = $member;
    }

}
