@foreach($numbers as $number)
				@if($number->id%10!=0)
					@if($number->number<10)
						@if($number->id_client!='')
							<input type="button" class="btn" name="number" value="0{{$number->number}}" style="color:red;">
						@else
							<input type="button" class="btn" name="number" value="0{{$number->number}}" onclick="selectnumber(this.value)">
						@endif
					@else
						@if($number->id_client!='')
							<input type="button" class="btn" name="number" value="{{$number->number}}" style="color:red;">
						@else
							<input type="button" class="btn" name="number" value="{{$number->number}}" onclick="selectnumber(this.value)">
						@endif
					@endif
				@else
				<br>
					@if($number->id_client!='')
						<input type="button" class="btn" name="number" value="{{$number->number}}" style="color:red;">
					@else
						<input type="button" class="btn" name="number" value="{{$number->number}}">
					@endif
				@endif
			@endforeach