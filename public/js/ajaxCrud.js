
var create_event = new Vue({

   el: '#sorteo-form',
   data: $('#sorteo-form').serialize();
   methods:{
    create_event: function(){

         this.$http.post('sorteo', this.tarea_nueva).then(function(){

         });
    }
   }
});