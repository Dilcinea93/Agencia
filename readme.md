<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About beatSys

-This is a SORTEOS y JUEGOS DE AZAR system.BeatSys makes easier and ..EFICAZ... the RIFAS and SORTEOS management for the most populars lotteries. You can create your own events registering the event information and setting ... SU LANZAMIENTO... on a specific date. Also you can get your favorite lottery billet. We are a laborious team working on management directly with lotteries centers, so the queue at lotteries centers are past!


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




/**
Mi forma de trabajar un nuevo proyecto.

	Analisis del problema: 5 días (diagramación UML, DB).
	Configuración del ambiente: 1 día.
	Tiempo por módulo: 7 días.
	Pruebas: 5 días.
	Documentacion: 3 días.
	Subida a servidor: 3 días.
*/
