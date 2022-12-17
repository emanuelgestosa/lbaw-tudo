@extends('layouts.app')
@push('body-class', 'reg-bg')

@section('content')

<div id="login-form">
  <div id="login-form2">
      <div id="logo">
          <img src="/img/logo.png" height="100px" weigth="100px" alt="Goose made by origami gradient from purple to pink">
      </div>
      <h1>Let's do it?</h1>

<form class="form-auth" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="name">Name</label>
    <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
    @if ($errors->has('name'))
      <span class="error">
          {{ $errors->first('name') }}
      </span>
    @endif

    <label for="username">Username</label>
    <input  class="form-control" id="username" type="text" name="username" value="{{ old('username') }}" required autofocus>
    @if ($errors->has('username'))
      <span class="error">
          {{ $errors->first('username') }}
      </span>
    @endif
  </div>
  <div class="form-row">
    <label for="email">E-Mail Address</label>
    <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required>
    @if ($errors->has('email'))
      <span class="error">
          {{ $errors->first('email') }}
      </span>
    @endif
    </div>
    <div class="form-row">
      <label for="phone_number">Phone Number</label>
      <input class="form-control" id="phone_number" type="text" name="phone_number" value="{{
      old('phone_number') }}" required>
      @if ($errors->has('phone_number'))
        <span class="error">
            {{ $errors->first('phone_number') }}
        </span>
      @endif
    </div>
    <div class="form-row">
      <label for="password">Password</label>
      <input class="form-control" id="password" type="password" name="password" required>
      @if ($errors->has('password'))
        <span class="error">
            {{ $errors->first('password') }}
        </span>
      @endif

      <label for="password-confirm">Confirm Password</label>
      <input class="form-control" id="password-confirm" type="password" name="password_confirmation" required>
    </div>
    <button type="submit" class="btn btn-primary">
      Register
    </button>
    <a id="login-now" href="{{ route('login') }}">I want to log in</a>
</form>
  </div>
</div>
@endsection
