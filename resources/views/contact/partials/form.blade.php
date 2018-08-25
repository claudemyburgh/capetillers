<form action="{{ route('contact.send') }}" method="post">
	{{ csrf_field() }}


	<div class="notify notify--warning-light">
		<span class="form__helper">The <strong class="text--danger">*</strong> indicate required fields</span>
		
	</div>

	@include('layouts.partials._contact_names')
	<div class="form__group  {{ $errors->has('subject') ? ' has__danger' : '' }}">
		<label for="subject" class="form__label">Subject <strong class="text--danger">*</strong></label>
		<input type="text" name="subject" id="subject" value="{{ old('subject') }}" class="form__item" required>
		@if ($errors->has('subject'))
			<span class="form__helper">{{ $errors->first('subject') }}</span>
		@endif
	</div>
	<div class="row">
		<div class="form__group md-col-6 {{ $errors->has('name') ? ' has__danger' : '' }}">
			<label for="name" class="form__label">Name <strong class="text--danger">*</strong></label>
			<input type="text" name="name" id="name" value="{{ old('name') }}" class="form__item" required>
			@if ($errors->has('name'))
				<span class="form__helper">{{ $errors->first('name') }}</span>
			@endif
		</div>
		
		<div class="form__group md-col-6{{ $errors->has('email') ? ' has__danger' : '' }}">
			<label for="email" class="form__label">Email <strong class="text--danger">*</strong></label>
			<input type="text" name="email" id="email" value="{{ old('email') }}" class="form__item" required>
			@if ($errors->has('email'))
				<span class="form__helper">{{ $errors->first('email') }}</span>
			@endif
		</div>
	
							
	</div>
	
	<div class="form__group {{ $errors->has('phone') ? ' has__danger' : '' }}">
		<label for="phone" class="form__label">Phone <strong class="text--danger">*</strong></label>
		<input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="form__item">
		@if ($errors->has('phone'))
			<span class="form__helper">{{ $errors->first('phone') }}</span>
		@endif
	</div>
	
	<div class="form__group {{ $errors->has('message_body') ? ' has__danger' : '' }}">
		<label for="message_body" class="form__label">Message  <strong class="text--danger">*</strong></label>
		<textarea name="message_body" id="message_body" cols="30" rows="8" class="form__item" required>{{ old('message_body') }}</textarea>
		@if ($errors->has('message_body'))
			<span class="form__helper">{{ $errors->first('message_body') }}</span>
		@endif
	</div>

	<div class="form__group">
		<button type="submit" class="btn btn--primary">SEND MAIL</button>
	</div>

</form>
