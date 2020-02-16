@extends('layouts.layout')
@section('title','Selecciona tu numero de la suerte')

@section('content')
<div class="row">
	<div class="col-md-6">
		@foreach($sorteo as $event)
		<div class="card">

				<div class="card-header">
					
					<h4 class="red">{{ $event->name }}</h4>
					
				</div>

				<!-- include('flash-message') -->
				<div class="card-content">
					{{ $event->award }}

					Bajo la lotería {{ $event->lottery }} el día 
					{{ $event->date }} a las 
					{{ $event->time }}
				</div>
		</div>

		<p class="p-4">
			{{ $event->description }}
		</p>

		<h4>Registrate en nuestro sistema para llevar una gestion más fácil de tus sorteos o rifas! </h4>
		@endforeach
	</div>
	<div class="col-md-6">
		<table>
			<h5>Aquí puedes ver los números que ya han sido seleccionados por otras personas</h5>

			@foreach($numbers as $number)
				@if($number->id%10!=0)
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

	<div id="contact">
		<input class="btn btn-warning btn-block" id="interested" @click="interested()" value="Estoy interesado en jugar">


		<div v-model="interestedshow" v-if="!interestedshow">	
			<form action="{{url('solicitar')}}" method="post" role="form" id="interestedform">
				{{csrf_field()}}
				@if($errors->any())
					<h4>Porfavor corrige los siguientes errores</h4>
		        	@foreach ($errors->all() as $error)
		            	<li><b>{{ $error }}</b></li>
		        	@endforeach
    			@endif

    			<div class="row" >
    				<div class="col-sm-5">
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
						<button type="submit" class="btn btn-warning" id="enviarsolicitud">Enviar</button>
					</div>
				</div>
			</form>
		</div>
	</div>


	<h4>Resultados de la loteria del zulia</h4>
	<iframe src="https://www.tuazar.com/loteria/triplezulia/resultados/2019/11/28/" width="100%" height="510" scrolling="auto" frameborder="0"></iframe>

	<br>
	@if($ganador!='')

		<!-- Como extraer el numero que gano hoy si estoy haciendo scrapping a la pagina? eso para saber si el numero de la tabla numbers en el campo number es igual al numero que salio... entonces el id_client que posee ese numero, es el ganador...
		esa consulta la tengo que hacer en el controlador.. Pero necesito un cronjob -->
		<h1>El ganador es <span class="" style="color:orange;">{{$ganador}}!!</span> CI:  <br>Felicidades!</h1>
		<p>Nos pondremos en contacto contigo para entregarte tu premio lo más pronto posible!!</p>
	@endif

	<script type="text/javascript" src="{{asset('vue/vue.js')}}"></script> 
  	<script type="text/javascript" src="{{asset('vue/vue-resource.js')}}"></script> 
      <!-- Js -->
    <script src="{{asset('/js/functions.js')}}"></script>
</div>
@endsection
