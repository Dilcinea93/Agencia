@extends('layouts.layout')
@section('title','Selecciona tu numero de la suerte')

@section('content')


<div id="contact">
	<div class="row">
		
		<div class="col-md-6">
			<h3>Elige aquí tu número de la suerte</h3>
			<p>Te daremos un ticket en formato PDF que sirva de constancia de que jugaste con nosotros!</p>
			<form method="post" action="{{route('comprar')}}" role="form">
			{{csrf_field()}}
			<input type="text" name="id_num" id="selectednumber">
			@if($errors->has('id_num'))
				<small class="form-text text-danger">
					{{$errors->first('id_num')}}
				</small>
			@endif

			<input type="text" name="id_event" id="id_event" value="{{$id}}">
			
			<br>
			@include('event.bougth');
		</div> <!-- col-md-6 -->
		
		
		<div class="col-sm-5">
			<h3>Déjanos tus datos para contactarte</h3>
			<label>
				Tu cédula
			</label>
			<input type="text" name="cedula" class="form-control" value="{{old('cedula')}}">
			@if($errors->has('cedula'))
				<small class="form-text text-danger">
					{{$errors->first('cedula')}}
				</small>
			@endif
			<label>
				Tu nombre
			</label>
			<input type="text" name="name" class="form-control" value="{{old('name')}}">

			@if($errors->has('name'))
				<small class="form-text text-danger">
					{{$errors->first('name')}}
				</small>
			@endif
			<label>
				Tu email
			</label>
			<input type="email"  id="email" name="email" class="form-control" onblur="valida_mail(this)" value="{{old('email')}}">
			@if($errors->has('email'))
				<small class="form-text text-danger">
					{{$errors->first('email')}}
				</small>
			@endif
			<label>
				Tu telefono
			</label>
			<input type="text" name="phone" class="form-control" maxlength="11" value="{{old('phone')}}">
			@if($errors->has('phone'))
				<small class="form-text text-danger">
					{{$errors->first('phone')}}
				</small>
			@endif



			</div>
		</div>



		<div class="row">
			
			<div class="col-sm-3 offset-3">
				<button type="submit" class="btn btn-danger"><a class="text-white">Comprar</a></button>
			</div>
		</div>
	</form> 
@endsection
<script type="text/javascript" src="{{asset('vue/vue.js')}}"></script> 
<script type="text/javascript" src="{{asset('vue/vue-resource.js')}}"></script>
 <script src="{{asset('js/functions.js')}}"></script>
 