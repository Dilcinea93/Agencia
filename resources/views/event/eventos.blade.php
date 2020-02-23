
@extends('layouts.layout')
@section('title','Eventos')

  
@section('content')
	
<h2>Eventos</h2>
	<h5>
		En ésta sección puedes seleccionar el evento que más te llame la atención y solicitar al administrador un número para participar.

		(Paginar ests resultados)
	</h5>
	@foreach($events as $sorteo)
	<div class="row">
		<div class="col-sm-7 ">
			
			<div class="card">
				<div class="card-header">
					{{$sorteo->name}}
				</div>
				<div class="card-body">
					sorteo programado para el 
					{{$sorteo->date}} a las 
					{{$sorteo->time}}. El premio será 
					{{$sorteo->award}}
					<br>
					<button class="btn btn-beat"><a href="{{route('event.show',['id'=>$sorteo->id])}}"> Quiero participar</a></button>
				</div>
			</div>
		</div>

			<div class="col-md-3 offset-1">

				<p>Desde aquí tambien puedes seleccionar otra lotería para comenzar a jugar</p>
				AQUI VA UNA COLUMNA DE IMAGENES DE LAS LOTERIAS CON LAS QUE JUGAMOS
			</div>
	</div>
	@endforeach
@endsection