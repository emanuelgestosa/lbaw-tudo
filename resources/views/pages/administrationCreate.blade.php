@extends('layouts.app')

@yield('content')

@section('content')

  <h1 id="page_name">Create User</h1>
  <form method="POST" action="/api/user">
      {{ csrf_field() }}
  
      <label for="name">Name</label>
      <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
      @if ($errors->has('name'))
        <span class="error">
            {{ $errors->first('name') }}
        </span>
      @endif
  
      <label for="username">Username</label>
      <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus>
      @if ($errors->has('username'))
        <span class="error">
            {{ $errors->first('username') }}
        </span>
      @endif
  
      <label for="email">E-Mail Address</label>
      <input id="email" type="email" name="email" value="{{ old('email') }}" required>
      @if ($errors->has('email'))
        <span class="error">
            {{ $errors->first('email') }}
        </span>
      @endif

      <label for="phone_number">Phone Number</label>
      <input id="phone_number" type="text" name="phone_number" value="{{
      old('phone_number') }}" required>
      @if ($errors->has('phone_number'))
        <span class="error">
            {{ $errors->first('phone_number') }}
        </span>
      @endif
  
      <label for="password">Password</label>
      <input id="password" type="password" name="password" required>
      @if ($errors->has('password'))
        <span class="error">
            {{ $errors->first('password') }}
        </span>
      @endif
  
      <label for="password-confirm">Confirm Password</label>
      <input id="password-confirm" type="password" name="password_confirmation" required>
  
      <button type="submit" class="btn btn-primary">
        Create
      </button>
      <a class="btn btn-primary" href="{{ ('/admins') }}">Go Back</a>
  </form>

@endsection

