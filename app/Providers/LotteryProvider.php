<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
USE App\Classes\Services\PaymentService;
USE App\Classes\Payment;
class LotteryProvider extends ServiceProvider
{
    public function register()
    {
        //
        $this->app->singleton("App\\Interfaces\\paymentInterface", function($app){
            //return (new PaymentService(new Payment()->getPayment()));

            return (new PaymentService( (new Payment())->getPayment() ) );

//La funcion resolve me retorna el objeto que se inyecta a las funciones.. 
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

        /*Servicio que procese pagos..
    puede ser un servicio que procese imagenes
    que reproduzca videos
    ...
    que haga algo.... (donde ese algo sera variable)
    que traduzca un texto.

    servicio que programe eventos con un cronjob...
    servicio que envie mensajes de texto..
    servicio que envie correos...

    no es lo mismo que un metodo de un controlador entonces?
    la idea de un service provider es registrar ese "metodo", ese servicio, que va a ser usado varias veces, para varias cosas, en el service container, de manera que haya una sola instancia de esta clase disponible para toda la aplicacion y que esta instancia reciba lo que sea que le vayan a mandar, de un tipo en concreto....
    de manera que se ejecute el servicio con los datos que le manden...
    la definicion de los datos queda por otro lado.


    */
}
