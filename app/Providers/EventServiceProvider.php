<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use App\Events\OrderShipped;
use App\Listeners\SendShipmentNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        OrderShipped::class=>
        SendShipmentNotification::class
        ],
    ];

    /*
        registra eventos: En la propiedad Listen crea un event OrserShipped y un listener SendShipmentNotificacion. entonces corre:
        php artisan event:generate y se crearan los directorios Event y Listeners
    */

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }

/*This function enables the automatic event discovery . So laravel find and register the events and listeners by scanning my application listeners directory. o.O
you can disable this by turning the return on FALSE*/
    public function shouldDiscoverEvents(){
        return true;
    }
}
