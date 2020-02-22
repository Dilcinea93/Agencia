@extends('layouts.app')
@section('title','Crear nuevo evento')

@section('content')

<div class="container-fluid">
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
              @foreach($events as $event)
              <tr id="sorteo_id_{{ $event->id }}">
                 <td>{{ $event->id  }}</td>
                 <td>{{ $event->name  }}</td>
                 <td>{{ $event->lottery }}</td>
                 <td>{{ $event->date }}</td>
                 <td>{{ $event->time  }}</td>
                 <td>{{ $event->award }}</td>
                 <td><a href="javascript:void(0)" id="edit-event" data-id="{{ $event->id }}" data-name="{{ $event->name }}" data-lottery="{{ $event->lottery }}" data-date="{{ $event->date }}" data-time="{{ $event->time }}" data-award="{{ $event->award }}" class="btn btn-info">Edit</a></td>
                 
                 <td>
                  <a href="javascript:void(0)" id="delete-event" data-id="{{ $event->id }}" class="btn btn-danger delete-event">Delete</a></td>
                  
              </tr>
              @endforeach
           </tbody>
          </table>
          
  </div>
  </div>
 <div class="modal fade" id="sorteoModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="sorteo-title"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </div>
        <div class="modal-body">
            <form id="sorteo-form" name="sorteo-form" class="form-horizontal">
              <input type="hidden" name="user_id" id="user_id">

               <label>Nombre del evento</label>
          <input type="text" class="form-control" name="name" id="name">

          <label>Con que lotería vas a jugar?</label>
          <select name="lottery" id="lottery" required class="form-control">
              @foreach($lotteries as $lottery)
                <option value="{{$lottery->id}}">{{$lottery->name}}</option>
              @endforeach
            </select>

          <label>Fecha del sorteo</label>
          <input type="text" class="form-control" name="date" id="date">

          <label>Hora</label>
          <input type="text" class="form-control" name="time" id="time">

          <label>Cual sera el Premio?</label>
          <input type="text" class="form-control" name="award" id="award">

          <label>Teléfono</label>
          <input type="text" class="form-control" name="phone" id="phone">


          <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" id="btn-save" value="create">Create Event
                  </button>
          </div>
        </form>
        </div>
    </div>
  </div>
  </div>

@endsection


    

