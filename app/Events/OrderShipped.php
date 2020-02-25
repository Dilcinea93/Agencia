<?php

namespace App\Events;

use App\client;
use App\numsModel;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OrderShipped
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


public $client;
public $nums;
public $id_evento;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Client $client,NumsModel $nums,$id_evento)
    {
        //
        $this->client= $client;
        $this->nums= $nums;
        $this->id_evento= $id_evento;

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
