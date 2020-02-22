 requests forms -->
<div class="row">
	<div class="col-md-12">
		<div id="contact">

		<h4>Si deseas jugar con nosotros, porfavor notificanos haciendo click en el boton de abajo y dejandonos tus datos para gestionar tu solicitud </h4>

		<input class="btn btn-beat btn-block" id="interested" @click="interested()" value="Estoy interesado en jugar">


		<div v-model="interestedshow" v-if="!interestedshow" class="col-md-10">	
			<form action="{{url('solicitar')}}" method="post" role="form" id="interestedform">
				{{csrf_field()}}
				@if($errors->any())
					<h4>Porfavor corrige los siguientes errores</h4>
		        	@foreach ($errors->all() as $error)
		            	<li><b>{{ $error }}</b></li>
		        	@endforeach
    			@endif

    			<div class="row" >
    				<div class="col-md-12">
    					<label>
							Tu nombre
						</label>
						<input type="text" name="name" class="form-control">


						<label>
							Tu email
						</label>
						<input type="text" name="email" class="form-control">

						<label>
							En que Evento quieres participar?
						</label>



		<select name="lotteries" id="lotteries" class="form-control" required>
                <option disabled selected>Elija uno</option>
                @foreach ($lotteries as $value)
                    <option value="{{ $value }}" >
                        {{ $value->name }}
                    </option>
                @endforeach
            </select>
						<label>
							Tu telefono
						</label>
						<input type="text" name="phone" class="form-control">
						<label>
							Quieres dejar algún mensaje?
						</label>
						<textarea class="form-control" name="comment"></textarea>
    				</div>
    			</div>
    			<div class="row">
					<div class="col-sm-3 offset-2 p-2">
						<button type="submit" class="btn btn-beat" id="enviarsolicitud">Enviar</button>
					</div>
				</div>
			</form>
		</div>

	</div>
	</div>
</div>

<!-- ends requests forms