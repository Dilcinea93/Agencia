@extends('layouts.layout')
@section('title','Inicio')

@section('content')

<!-- START NEWS -->
<div class="row">
	<div class="col-md-5">
		<p>
			This is a SORTEOS y JUEGOS DE AZAR system.BeatSys makes easier and ..EFICAZ... the RIFAS and SORTEOS management for the most populars lotteries. You can create your own events registering the event information and setting ... SU LANZAMIENTO... on a specific date. Also you can get your favorite lottery billet. We are a laborious team working on management directly with lotteries centers, so the queue at lotteries centers are past!
		</p>
	</div>
	<div class="col-md-5">
		<img src="" title="CHANCE">
	</div>
</div>

<div class="row">
	<div class="col-md-5">
		<img src="" title="ANIMALITOS">
	</div>
	<div class="col-md-5">
	<p>
		beatSys cuenta con un sistema de procesamiento de pagos para facilitar a tus compradores la tarea de cancelar el monto asignado por ticket, y además facilitarte a tí el acceso a los ingresos recolectados con tus eventos una vez llegada la fecha tanto si decides programar un evento o gestionar la venta de tickets de loterías desde la comodidad de tu casa.

		Si quieres ser parte de nuestra comunidad y gestionar tus propias rifas u obtener ingresos extra bajo esta modalidad, regístrate en nuestro sistema!
		
	</p>
	</div>
</div>
<!-- END NEWS -->
<hr>
@include('emails.requestform')
<!-- Newsletter -->
<div class="row">
	<div class="col-md-12">
		
		<h3>Suscríbete a nuestro boletín de noticias para recibir en tu bandeja de entrada las noticias de eventos nuevos y como puedes ganar!</h3>
		<div  class="col-md-10">	
			BOLETIN
		</div>

	</div>
</div>
<!-- Ends newletter -->

@endsection
