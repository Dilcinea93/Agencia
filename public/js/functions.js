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

