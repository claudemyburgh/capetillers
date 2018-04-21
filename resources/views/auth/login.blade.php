@extends('layouts.login')

@section('content')
        <a target="_blank" href="http://designbycode.co.za">
            <img class="logo" src="{{ asset('img/admin/dbc-logo.svg') }}" alt="DBC Admin">
        </a>
    <div class="form__holder">
        

        <form method="POST" action="{{ route('login') }}">
            @csrf
             
            <div class="form__group {{ $errors->has('email') ? 'has__danger' : '' }} ">
                <label for="email" class="form__label">E-Mail Address</label>
                <input type="email" name="email" id="email" class="form__item" value="{{ old('email') }}" >
                @if ($errors->has('email'))
                    <small class="form__helper">
                        <strong>{{ $errors->first('email') }}</strong>
                    </small>
                @endif
            </div>    
             
            <div class="form__group {{ $errors->has('password') ? 'has__danger' : '' }} ">
                <label for="password" class="form__label">E-Mail Address</label>
                <input type="password" name="password" id="password" class="form__item" value="{{ old('password') }}" >
                @if ($errors->has('password'))
                    <small class="form__helper">
                        <strong>{{ $errors->first('password') }}</strong>
                    </small>
                @endif
            </div>    

            <div class="form__group">
                <div class="form__group__checkbox">
                   <input id="remember" type="checkbox" name="remember" class="form__checkbox"/>
                   <label for="remember"  class="from__label__checkbox">Remember Me</label>
                 </div>
            </div>

            <div class="form_group">
                <div class="button__group">
                    <button type="submit" class="btn btn--block btn--primary">
                        Login
                    </button>

                </div>
            </div>


        </form>    
    </div>
    <a class="btn btn--block" href="{{ route('password.request') }}">
        Forgot Your Password?
    </a>

@endsection
