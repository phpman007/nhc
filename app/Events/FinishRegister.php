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

class FinishRegister
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $member;

    public $form;

    public function __construct(Member $member, $form = 1)
    {
        $this->member   = $member;
        $this->form     = $form;
    }


}
