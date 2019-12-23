@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">

            <a class="navbar-brand links text-black"  href="{{route('numberlist')}}" ><b><h4> Listado de numeros </h4></b></a>

            <a class="navbar-brand links text-black"  href="{{url('sorteo')}}" ><b><h4> <span class="glyphicon glyphicon-user"></span>Crear nuevo evento </h4></b></a>
        </div>
        <div class="col-md-8">

        	<h3>Ventas concretadas</h3>
        	<table class="table striped">
        		<tr>
        			<td>Cliente</td>
        			<td>Número comprado</td>
        			<td>Sorteo</td>
        			<td>Fecha</td>
        		</tr>
        		<!-- Consultar a las tres tablas para hacer esta, las relaciones ya estan en los modelos, ve como imprimir la informacion correcta aqui -->
        		@foreach($ventas as $venta)
	        	<td>{{$venta->fecha}}</td>
                <td>{{$venta->client->cedula}}</td>
	        	@endforeach
        	</table>
	     </div>
    </div>
</div>
@endsection