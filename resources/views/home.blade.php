@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <a class="navbar-brand links text-black"  href="{{url('events/event')}}" ><b><h4> <span class="glyphicon glyphicon-user"></span>Crear nuevo evento </h4></b></a>
        </div>
        <div class="col-md-8 table-responsive">

        	<table class="table striped">
                <thead>
                    <tr>
                        <th colspan="6">
                            VENTAS CONCRETADAS
                        </th>
                    </tr>
                </thead>
        		<tr>

                    <td>ID evento</td>
        			<td>Cédula cliente</td>
                    <td>Nombre Cliente</td>
        			<td>Número comprado</td>
        			<td>Fecha</td>
                    <td>Monto</td>
        		</tr>
        		@foreach($ventas as $venta)

                <td>{{$venta->event->name}}</td>
                <td>{{$venta->client->cedula}}</td>
                <td>{{$venta->client->name}}</td>
                <td>{{$venta->id_num}}</td>
                <td>{{$venta->fecha}}</td>
                <td>{{$venta->event->amount}}</td>
            </tr>
	        	@endforeach
        	</table>
            <div class="row">
                <div class="col-md-5 offset-4">
                        
                    <div class="alert alert-danger">
                    <h5>Faltan por vender (para esto puedo usar el observador): {{$faltan}}</h5>
                    <h5>Ingresos totales por ventas: {{$incomings}}</h5>
                    </div>

                </div>
            </div>
	     </div>
    </div>
</div>
@endsection