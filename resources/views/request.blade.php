@component('mail::message')

Nueva solicitud de ticket. 
Recibiste una nueva solicitud de {{$name}}. 

Te dejo como mensaje lo siguiente:

{{$comment}}

Ponte en contacto al numero {{$phone}}  o al coreo {{$email}}.
Una vez que se realice el pago, haz click en el siguiente enlace para autorizarlo a ingresar al formulario de numeros.

este boton de autorizar debe redirigir a la URL correcta. Como hago que este boton permita que el usuario seleccione numeros? o como lo hago?

@component('mail::button', ['url' => '/autorizar'])
Autorizar
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
