@extends('layouts.app')

@yield('content')

@section('content')

  <h1>Tu-Do</h1>
  <h2>A beautiful slogan...</h2>
  <a class="button" href="{{ url('/register') }}"> Create an account </a>
  <a class="button" href="{{ url('/login') }}"> Log in </a>

@endsection
