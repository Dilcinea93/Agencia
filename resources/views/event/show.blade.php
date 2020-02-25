
@extends('layouts.layout')
@section('title','Información del evento')


  
@section('content')
@foreach($event as $info)

Título del sorteo: {{$info->name}}

	<div class="row ">
		<div class="col-sm-5">
			<div class="card">
				<div class="card-body">
					Este sorteo se realizará el 
					{{$info->date}} a las 
					{{$info->time}}. El premio será 
					{{$info->award}}
					<br>

					<b>	Responsable: ACOMODAR ESTO</b>
				</div>
			</div>

			<p class="text">Para poder comprar un número debes solicitarlo antes a nuestro equipo. Luego de concretar el pago recibirás un correo elecrónico confirmandote que puedes acceder a tu cuenta de usuario para seleccionar el número de tu preferencia</p>

		</div>
		<div class="col-sm-5 offset-1 ">

		<table>
				<h5>Aquí puedes ver los números que ya han sido seleccionados por otras personas para este evento</h5>

				@foreach($numbers as $number)
					@if($number->id%10!=0)
					<!-- Numeros de x0 a x9..... -->
						@if($number->number<10)
							@if($number->id_client!='')
								<input type="button" class="btn" name="number" value="0{{$number->number}}" style="color:red;">
							@else
								<input type="button" class="btn" name="number" value="0{{$number->number}}">
							@endif
						@else
							@if($number->id_client!='')
								<input type="button" class="btn" name="number" value="{{$number->number}}" style="color:red;">
							@else
								<input type="button" class="btn" name="number" value="{{$number->number}}">
							@endif
						@endif
					@else
					<br>
						@if($number->id_client!='')
							<input type="button" class="btn" name="number" value="{{$number->number}}" style="color:red;">
						@else
							<input type="button" class="btn" name="number" value="{{$number->number}}">
						@endif
					@endif
				@endforeach
				
				</table>
			</div>
	</div>



<div class="row">
	<div class="col-md-12">
		<div id="contact">

		<h4>Si deseas jugar con nosotros, porfavor notificanos llenando los campos de abajo y dejandonos tus datos para gestionar tu solicitud </h4>



		<div v-model="interestedshow" v-if="!interestedshow" class="col-md-10">	
			<form action="{{url('solicitar')}}" method="post" role="form" id="interestedform">
				{{csrf_field()}}
				@if($errors->any())
					<h4>Porfavor corrige los siguientes errores</h4>
		        	@foreach ($errors->all() as $error)
		            	<li><b>{{ $error }}</b></li>
		        	@endforeach
    			@endif

    			<div class="row" >
    				<div class="col-md-12">
    					<label>
							Tu nombre
						</label>
						<input type="text" name="name" class="form-control">


						<label>
							Tu email
						</label>
						<input type="text" name="email" class="form-control">
						<label>
							Tu telefono
						</label>
						<input type="text" name="phone" class="form-control">
						<label>
							Quieres dejar algún mensaje?
						</label>
						<textarea class="form-control" name="comment"></textarea>
    				</div>
    			</div>
    			<div class="row">
					<div class="col-sm-3 offset-2 p-2">
						<button type="submit" class="btn btn-beat">Enviar</button>
					</div>
				</div>
			</form>
		</div>
<br>
		<div class="row"> Una vez aprobada la solicitud, Accede &nbsp;&nbsp; 
			<button class="btn btn-info"><a href="{{url('numberlist',['id'=>$info->id])}}"> Aquí </a></button>  &nbsp;&nbsp;al listado de números
		</div>
	</div>
	</div>
</div>


	@endforeach

<!-- ends requests forms-->
@endsection