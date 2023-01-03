@extends('layouts.app')
@push('body-class', 'login-bg')

@section('content')

<div id="login-form">
    <div id="login-form2">
        <div id="logo">
            <img src="/img/logo.png" height="100px" weigth="100px" alt="Goose made by origami gradient from purple to pink">
        </div>
        <h1>Welcome Back!</h1>

    <form class="form-auth" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="username" class=>Username</label>
                <input id="username" class="form-control" type="text" name="username" placeholder="Username" value="{{ old('username') }}" required autofocus>
                @if ($errors->has('username'))
                    <span class="error">
                    {{ $errors->first('username') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="password" >Password</label>
                <input id="password" class="form-control" type="password" placeholder="Password" name="password" required>
                @if ($errors->has('password'))
                    <span class="error">
                        {{ $errors->first('password') }}
                    </span>
                @endif        
            </div>
            <button type="submit" class="btn btn-primary">
                Login
            </button>
        </div>


        <label id="remember-me">
            <input  type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
        </label>

        <a tabindex="0" id="register-now" href="{{ route('register') }}">Register Now!</a>
    </form>
</div>
</div>
@endsection
