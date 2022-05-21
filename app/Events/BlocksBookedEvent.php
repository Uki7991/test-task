<?php

namespace App\Events;

use App\Models\Location;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BlocksBookedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $bookedBlocks;
    /**
     * @var User
     */
    public $user;
    /**
     * @var Location
     */
    public $location;
    public $days;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param $bookedBlocks
     * @param Location $location
     * @param $days
     */
    public function __construct(User $user, $bookedBlocks, Location $location, $days)
    {
        $this->bookedBlocks = $bookedBlocks;
        $this->user = $user;
        $this->location = $location;
        $this->days = $days;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
