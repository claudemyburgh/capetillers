@extends('layouts.login')

@section('content')


<a target="_blank" href="http://designbycode.co.za">
	<img class="logo" src="{{ asset('img/admin/dbc-logo.svg') }}" alt="DBC Admin">
</a>
<div class="form__holder">

	<form method="POST" action="{{ route('password.request') }}">
		@csrf
		<input type="hidden" name="token" value="{{ $token }}">

		<div class="form__group{{ $errors->has('email') ? ' has__danger' : '' }}">
			<label for="email" class="form__lablel"><strong>E-Mail Address</strong></label>


			<input id="email" type="email" class="form__item" name="email" value="{{ $email or old('email') }}"  autofocus>

				@if ($errors->has('email'))
				<span class="form__helper">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
				@endif

		</div>

		<div class="form__group{{ $errors->has('password') ? ' has__danger' : '' }}">
			<label for="password" class="form__lablel "><strong>Password</strong></label>


				<input id="password" type="password" class="form__item" name="password" >

				@if ($errors->has('password'))
				<span class="form__helper">
					<strong>{{ $errors->first('password') }}</strong>
				</span>
				@endif

		</div>

		<div class="form__group{{ $errors->has('password_confirmation') ? ' has__danger' : '' }}">
			<label for="password-confirm" class="form__lablel"><strong>Confirm Password</strong></label>

				<input id="password-confirm" type="password" class="form__item" name="password_confirmation" >

				@if ($errors->has('password_confirmation'))
				<span class="form__helper">
					<strong>{{ $errors->first('password_confirmation') }}</strong>
				</span>
				@endif

		</div>

		<div class="form__group">
				<button type="submit" class="btn btn--primary btn--block">
					Reset Password
				</button>
		</div>
	</form>  

</div>                 

@endsection
