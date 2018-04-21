@extends('layouts.login')

@section('content')


<a target="_blank" href="http://designbycode.co.za">
    <img class="logo" src="{{ asset('img/admin/dbc-logo.svg') }}" alt="DBC Admin">
</a>
<div class="form__holder">
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        
        
            <div class="form__group {{ $errors->has('email') ? ' has__danger' : '' }} ">
                <label for="email" class="form__label">E-Mail Address</label>
                <input type="email" name="email" id="email" class="form__item">
                @if ($errors->has('email'))
                    <small class="form__helper">
                        <strong>{{ $errors->first('email') }}</strong>
                    </small>
                @endif
            </div>

  

        <div class="form__group">
            <button type="submit" class="btn btn--primary btn--block">Send Password Reset Link</button>
        </div>

    </form>
</div>

@endsection
