<?php

namespace App\Listeners;

use App\venta;
use App\Events\OrderShipped;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendShipmentNotification
{
    /*
        This Listener registers the ticket purchase at the Ventas table 
    */
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
     * @param  Registered  $event
     * @return void
     */
    public function handle(OrderShipped $event)
    {
        venta::create(
            [
                'id_client'=>$event->client->id,
                'id_user'=>1,
                'id_num'=>$event->client->id_num,
                'id_event'=>$event->client->id,
                'amount'=>5000,
                'fecha'=>'2006-02-15',
                'status'=>1
            ]
        );
    }
}
