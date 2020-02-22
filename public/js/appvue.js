var massive = new Vue({
	el: '#contact',
	data: {
		interestedshow: false
	},
	methods: {
		interested: function(){
        	this.interestedshow= true;
		}
	}
});
function selectnumber(val){
	document.getElementById('selectednumber').value=val;
}
function interested(){
	document.getElementById('interested-form').style.display="block";
}
function solicitar(){
	alert('Gracias por tu mensaje. En unos minutos nos pondremos en contacto contigo')
}
//valida correo
	function valida_mail(e){
	d=0;
	p=0;
	var c=e.value;
	
	for(i=1;i<c.length;i++){
		if(c.charAt(i-1)=="@"){
			d++;
		}
		if(d==1){
			if(c.charAt(i-1)=="."){
				p++;
         		e.style.border="1px solid green"
			}
		}
	}
	
	if(d!=1||p!=1){
        e.style.border="1px solid red";
	}
}

$(document).ready(function () {
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#create-event').click(function () {
        $('#btn-save').val("create-event");
        $('#sorteo-form').trigger("reset");
        $('#sorteo-title').html("Agregar nuevo sorteo");
        $('#sorteoModal').modal('show');
    });

    /* When click edit user */
    $('body').on('click', '#edit-event', function () {

      var event_id = $(this).data('id');
      var name = $(this).data('name');
      var lottery = $(this).data('lottery');
      var date = $(this).data('date');
      var time = $(this).data('time');
      var award = $(this).data('award');

      $.get('sorteo/'+ event_id +'/edit', function (data) {
      	$('#sorteo-title').html("Editar evento");

          $('#btn-save').val("edit-event");
          $('#sorteoModal').modal('show');

          $('#name').val(name);
          $('#lottery').val(lottery);
          $('#date').val(date);
          $('#time').val(time);
          $('#award').val(award);
      });
    });


   //delete user login
    $('body').on('click', '.delete-event', function () {
    	var event_id = $(this).data("id");

        confirm("Are You sure want to delete !");
        $.ajax({
            type: "DELETE",
            url: "sorteo"+'/'+event_id,
            success: function (data) {
              console.log("Llego aqui");
                $("#sorteo_id_" + event_id).remove();
            },
            error: function (data) {
                console.log('Error:'+ data);
            }
        });
    });


    /*****************************************/
    /*SUBMIT HANDLER*/

     if ($("#sorteo-form").length > 0) {
     
      $("#sorteo-form").validate({
 /*Hay una falla aqui y no entra al validate.. asi que no hace lo demas..
 y esta misma funcion es la del edit, asi que por eso tampoco edita*/
     submitHandler: function(form) {
       console.log('paso por aqui');
 var token = '{{csrf_token()}}';
      var actionType = $('#btn-save').val();
      $('#btn-save').html('Sending..');
      $.ajax({
          data:$('#sorteo-form').serialize(),
          url: "sorteo",
          type: "POST",
          dataType: 'json',
          success: function (data) {
            alert("LLEGO AQUI");
              var evento = '<tr id="sorteo_id_' + data.id + '"><td>' + data.name + '</td><td>' + data.lottery + '</td><td>' + data.date + '</td>'+'<td>'+data.time+'</td><td>'+data.award+'</td>';
              evento += '<td><a href="javascript:void(0)" id="edit-event" data-id="' + data.id + '" class="btn btn-info">Edit</a></td>';
              evento += '<td><a href="javascript:void(0)" id="delete-event" data-id="' + data.id + '" class="btn btn-danger delete-user">Delete</a></td></tr>';
               
              
              if (actionType == "create-event") {
                  $('#results').prepend(evento);
              } else {
                  $("#sorteo_id_" + data.id).replaceWith(evento);
              }
 
              $('#sorteo-form').trigger("reset");
              $('#sorteoModal').modal('hide');
              $('#btn-save').html('Guardar cambios');
              
          },
          error: function (data) {
              console.log('Error:', data);
              $('#btn-save').html('Guardar cambios');
          }
      });
    }
  });
}
});
