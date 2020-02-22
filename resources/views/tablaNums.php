
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

		
		@endforeach

	</div>
	<div class="col-md-6">
		<table>
			<h5>Aquí puedes ver los números que ya han sido seleccionados por otras personas</h5>

			@include('event.bougth');
		</table>
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