<div class="from__group">
	<label for="reciever" class="form__label">How do you want to contact?</label>
	<select name="reciever" id="reciever" class="form__item">
		@foreach ($agents as $agent)
			<option value="{{ $agent->email }}">{{ $agent->name }}   &nbsp; - &nbsp;  {{ $agent->area }}</option>
		@endforeach

	</select>
</div>