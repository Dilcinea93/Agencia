@extends('layouts.layout')
@section('title','Home')


  
@section('content')
	@foreach($numbers as $number)
	<div class="row">
		
		<div class="col-md-6">

			<div class="card">
				<div class="card-header">
					
					<h4 class="red">Gran Rifa Navideña</h4>
					
				</div>

				<!-- include('flash-message') -->
				<div class="card-content">
				<ul>
					<li>20 Hallacas</li>
					<li>1 kg ensalada de gallina</li>
					<li>Un pan de jamon</li>
				</ul>
				</div>
			</div>
			
			<p class="p-4">
				Te invitamos a unirte a este evento que se estará realizando el día 22 de Diciembre. Por razones de traslado, nos limitamos al área Metropolitana de Caracas.. Sin embargo, si está a tu alcance venir el día del evento, eres bienvenido y nos pondríamos en contacto contigo para entregarte tu premio.
				Anímate a ser el ganador de una deliciosa cena navideña para compartir con tu familia en esta nochebuena!


			</p>
		</div>
		<div class="col-md-6">
		<table>
<h5>Aquí puedes ver los números que ya han sido seleccionados por otras personas</h5>

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
	<!-- Numeros 10, 20, 30..... -->
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
	<div class="col-sm-5" >
		
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
</div>
</div>

</form>


</div>
</div>
	</div>



<h4>Resultados de la loteria del zulia</h4>
<small>
<iframe src="https://www.tuazar.com/loteria/triplezulia/resultados/2019/11/28/" width="100%" height="510" scrolling="auto" frameborder="0"></iframe>

<br>
esto no es la loteria del zulia.. Sincronizar con loteria del zulia</small>
@if($ganador)

<!-- Como extraer el numero que gano hoy si estoy haciendo scrapping a la pagina? eso para saber si el numero de la tabla numbers en el campo number es igual al numero que salio... entonces el id_client que posee ese numero, es el ganador...
esa consulta la tengo que hacer en el controlador.. Pero necesito un cronjob -->
	<h1>El ganador es <span class="" style="color:orange;">{{$ganador}}!!</span> CI:  <br>Felicidades!</h1>
	<p>Nos pondremos en contacto contigo para entregarte tu premio lo más pronto posible!!</p>
@endif

@endsection 


<script type="text/javascript" src="{{asset('vue/vue.js')}}"></script> 
  <script type="text/javascript" src="{{asset('vue/vue-resource.js')}}"></script> 
      <!-- Js -->
    <script src="{{asset('/js/functions.js')}}"></script>