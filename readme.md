<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About beatSys

-This was only a text for english practice. 

-This is a SORTEOS y JUEGOS DE AZAR system. BeatSys makes easier and ..EFICAZ... the RIFAS and SORTEOS management for the most populars lotteries. You can create your own events registering the event information and setting ... SU LANZAMIENTO... on a specific date. Also you can get your favorite lottery billet. We are a laborious team working on management directly with lotteries centers, so the queue at lotteries centers are past! 


Beatsys is a extensible system, that presents information about the most popular games results and a event list where you can know about the unavailable numbers to participate in, and ask for a PDF ticket with your chosen number that certifies your PARTICIPACION on the event, so, with it you can RECLAMAR the award.

As well, our team are ...ATENTO.. to the LANZAMIENTO DEL EVENTO... and the results giver by the system. LLEGADA LA FECHA Y HORA of the event, visit our site! It displays the information about the winner (Name, ID number), as UN AVAL that we will contact you PARA ENTREGARTE TU PREMIO and we CUMPLIMOS CON NFORMAR to the people about th winner number.



beatSys cuenta con un sistema de procesamiento de pagos para facilitar a tus compradores la tarea de cancelar el monto asignado por ticket, y además facilitarte a tí el acceso a los ingresos recolectados con tus eventos una vez llegada la fecha tanto si decides programar un evento o gestionar la venta de tickets de loterías desde la comodidad de tu casa.

En beatSys, no tienes que registrarte para poder jugar con nosotros, únicamente debes esperar la autorización de nuestro equipo para poder seleccionar un número o una lotería una vez efectuado el pago. Una vez efectuado te daremos un comprobante de que fué cancelado el monto correspondiente al ticket y te daremos acceso al listado de numeros correspondientes a la lotería que hayas seleccionado.

Si quieres ser parte de nuestra comunidad y gestionar tus propias rifas u obtener ingresos extra bajo esta modalidad, regístrate en nuestro sistema.

--------------------------------------------------------------------------------------
-apartar números de chance (clase Chance).
-Botones para seleccionar lotería (clase Abstracta Lotería).
-Usuarios (Administrador es el que da permisos a los usuarios para poder comprar/ usuario es el que entra para poder elegir un numero) (clase Usuario)
-Usuario accede al procesador de pagos(clase Pagos)
-Usuario accede al listado de la lotería seleccionada.


si consultare una fuente de datos, necesito ESA fuente de datos.
si voy a procesar una imagen, necesito esa imagen.
si voy a armar un PDF.... puedo armar el PDF, sin informacion. asi que necesito la infoormacion para poder ponerle contenido
que cosas dependen de otras?

el procesamiento de una imagen depende de que la imagen exista. 
el inicio de sesion de un usuario depende de que el usuario exista.
----*la consulta de datos depende de que hayan datos. (no, porque si no hay datos, la consulta se hace igual...)*-
la conexion a base de datos depende de que haya un driver de conexion... verdad?
la programacion de un evento necesita que hay un evento.
el envio de mensaje de texto necesita que haya un numero de telefono. ---*(Un numero de telefono no es un objeto.. un numero de telefono es un numero y ya... necesito objetos que dependan de otros objetos.)*---
consultar datos en paginas requiere que haya paginas.
el envio de correos requiere que haya un correo al cual enviar el mensaje.



Para este proyecto se incluyen:
1 Evento del modelo. (evento y listener)
Se crea desde el EventServiceProvider, en el array 
protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        OrderShipped::class=>
        SendShipmentNotification::class
        ],
    ];

Donde el primer parametro (OrderShipped::class por ejemplo), corresponde al evento que quieres crear, y el segundo corresponde al listener.

coloca estos imports en el eventServiceProvider

use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use App\Events\OrderShipped;

y ejecuta php artisan event:generate, para generar tanto el evento como el listener en la carpeta app/events y app/listeners respectivamente.

En el evento importa los modelos.
asigna variables del constructor a variables de instancia, que seran enviadas automaticaamente al listener asociado. En este caso SendShipmentNotification. En el metodo handle, la variable Event contiene todo lo que se define en el constructor del evento. Obviamente su argumento debe ser del tipo de dato de la clase del evento... en este caso OrderShipped. Entonces defines ahi la funcionalidad que quieres que haga, y ya.

Preferí usar el evento del modelo y no el observador ya que el observador actua sobre el mismo modelo, y con el evento pude guardar datos en otro modelo, que es lo que necesitaba.

1 Observador.

con php artisan make:observer nombreObserver, creas un nuevo archivo observador...
            Para que funcione el observador, debes poner esto en el AppServiceProvider@boot() 

            \App\client::observe(\App\Observers\sellObserver::class);

obviamente importar los modelos en el archivo del observador

1 Mailable.

2 Clases.

1 interfaz. But i don't know where to use it

1 Request para las validaciones de la seccion de compra.
(comando php artisan make:Request FormRequest)
En HTTP/Request se crea un archivo en el que se colocaran las reglas de validacion. El return del metodo authorize debe ser cambado a true. 
El reuest debe ser importado en el controlador obviamente, 
y en la funcion del controador cambir el tipo de parametro al nombre de la case de validacin, asi: public function comprar(FormRequest $request){

1 notificacion:

comando: php artisan make:notification , crea un archivo en APP\Notifications.
la clase de notificaion definemetodos para las vias donde se enviaara el mensaje. Puedes visualzar Laravel notification Channels para mas informaion.

La clase del modelo que enviara notificaciones debe importar 
use Illuminate\Notifications\Notifiable; y usar (como si fuera un trait)  use Notifiable; (dentro de la clase, antes del constructor si quieres)

"Este atributo es utilizado por el modelo App\User por defecto y contiene un método que puede ser usado para enviar notificaciones: notify. El método notify espera recibir una instancia de notificación:"
(osea, el $objModel puede acceder a un metodo notify asi: $user->notify(new InvoicePaid($invoice));)

Tambien puedes enviar notifiaciones usando el facade asi: Notification::send($users, new InvoicePaid($invoice));

El método via recibe una instancia $notifiable la cual será una instancia de la clase a la cual la notificación está siendo enviada. Puedes usar $notifiable para determinar mediante cuáles canales debería ser entregada la notificación:
