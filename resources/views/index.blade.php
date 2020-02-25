@extends('layouts.layout')
@section('title','Inicio')

@section('content')

<!-- START NEWS -->

<div class="row">
	@foreach($texts as $text)
	<div class="col-md-5 p-3">
		<p>
			{{$text}}
		</p>
	</div>
	@endforeach
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
