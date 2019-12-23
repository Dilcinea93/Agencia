@extends('layouts.layout')
<!-- Porque no extiende del layout?-->
@section('title','Crear nuevo evento')
@section('content')
<div class="container">
    <h2 style="margin-top: 12px;" class="alert alert-success">Crear nuevo evento</h2><br>
    <div class="row">
        <div class="col-12">
          <a href="javascript:void(0)" class="btn btn-success mb-2" id="create-event">Add Event</a> 
          
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Nombre del evento</th>
                 <th>Lotería</th>
                 <th>Fecha del sorteo</th>
                 <th>Hora</th>
                 <th>Premio</th>
                 <td colspan="2">Acciones</td>
              </tr>
           </thead>
           <tbody id="sorteo-crud">
              @foreach($sorteos as $sorteo)
              <tr id="sorteo_id_{{ $sorteo->id }}">
                 <td>{{ $sorteo->id  }}</td>
                 <td>{{ $sorteo->name  }}</td>
                 <td>{{ $sorteo->lottery }}</td>
                 <td>{{ $sorteo->date }}</td>
                 <td>{{ $sorteo->time  }}</td>
                 <td>{{ $sorteo->award }}</td>
                 <td><a href="javascript:void(0)" id="edit-event" data-id="{{ $sorteo->id }}" data-name="{{ $sorteo->name }}" data-lottery="{{ $sorteo->lottery }}" data-date="{{ $sorteo->date }}" data-time="{{ $sorteo->time }}" data-award="{{ $sorteo->award }}" class="btn btn-info">Edit</a></td>
                 
                 <td>
                  <a href="javascript:void(0)" id="delete-event" data-id="{{ $sorteo->id }}" class="btn btn-danger delete-event">Delete</a></td>
                  
              </tr>
              @endforeach
           </tbody>
          </table>
          {{ $sorteos->links() }}
       </div> 
    </div>
</div>
 
 <div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="sorteoModal"></h4>
        </div>
        <div class="modal-body">
            <form id="sorteo-form" name="sorteo-form" class="form-horizontal" >

<input type="hidden" name="_token" value="{{csrf_token()}}">
               <input type="hidden" name="sorteo_id" id="sorteo_id">
               <div class="row">
        <div class="col-sm-3">
        
          <label>Nombre del evento</label>
          <input type="text" class="form-control" name="name" id="name">

          <label>Con que lotería vas a jugar?</label>
          <input type="text" class="form-control" name="lottery" id="lottery">

          <label>Fecha del sorteo</label>
          <input type="text" class="form-control" name="date" id="date">
        </div>
        <div class="col-sm-3">
          <label>Hora</label>
          <input type="text" class="form-control" name="time" id="time">

          <label>Cual sera el Premio?</label>
          <input type="text" class="form-control" name="award" id="award">

          <label>Teléfono</label>
          <input type="text" class="form-control" name="phone" id="phone">

        <div>
        <div class="col-sm-6">  
        </div>

      </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
                  </button>
                </div>
            </form>
        </div>
        
    </div>
  </div>
</div>

<script src="{{asset('js/functions.js')}}"></script>

@endsection