@extends('layouts.app')
<!-- Porque no extiende del layout bien? El JS no me funciona-->
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
          <input type="text" class="form-control" name="lottery" id="lottery">

          <label>Fecha del sorteo</label>
          <input type="text" class="form-control" name="date" id="date">

          <label>Hora</label>
          <input type="text" class="form-control" name="time" id="time">

          <label>Cual sera el Premio?</label>
          <input type="text" class="form-control" name="award" id="award">

          <label>Teléfono</label>
          <input type="text" class="form-control" name="phone" id="phone">

          <input type="submit" class="btn   btn-success">

          <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
                  </button>
                </div>
        </form>
        </div>
    </div>
  </div>
  </div>
 <!-- Jquery -->
    <script src="{{asset('js/jquery.min.js')}}"></script> 
<script src="{{asset('js/functions.js')}}"></script>

@endsection