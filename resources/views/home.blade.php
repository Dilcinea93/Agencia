@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">

            <a class="navbar-brand links text-black"  href="{{route('numberlist')}}" ><b><h4> Listado de numeros </h4></b></a>

            <a class="navbar-brand links text-black"  href="{{url('events/event')}}" ><b><h4> <span class="glyphicon glyphicon-user"></span>Crear nuevo evento </h4></b></a>
        </div>
        <div class="col-md-8">

        	<h3>Ventas concretadas</h3>
        	<table class="table striped">
        		<tr>
        			<td>Cédula cliente</td>
                    <td>Nombre Cliente</td>
        			<td>Número comprado</td>
        			<td>Sorteo</td>
        			<td>Fecha</td>
                    <td>Monto</td>
        		</tr>
        		@foreach($ventas as $venta)
                <td>{{$venta->client->cedula}}</td>
                <td>{{$venta->client->name}}</td>
                <td>{{$venta->id_num}}</td>
	        	<td>Agrega el nombre del sorteo... Agrega la relacion en el modelo. No lo quise hacer porque no vaya a ser que mas bien la cague, no se si la estoy cagando ya xD</td>
                <td>{{$venta->fecha}}</td>
                <td>{{$venta->amount}}</td>
            </tr>
	        	@endforeach
        	</table>

            <h2>Faltan por vender: {{$faltan}}</h2>
            <h2>Ingresos totales por ventas: {{$incomings}}</h2>
	     </div>
    </div>
</div>
@endsection