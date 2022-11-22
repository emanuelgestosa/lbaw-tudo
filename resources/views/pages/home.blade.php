@extends('layouts.app')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">

@yield('content')

@section('content')

  <h1>Tu-Do</h1>
  <h2>To simplify your life</h2>

  @if (!Auth::check())
    <a class="button" href="{{ url('/register') }}"> Create an account </a>
    <a class="button" href="{{ url('/login') }}"> Log in </a>
  @endif

@endsection
