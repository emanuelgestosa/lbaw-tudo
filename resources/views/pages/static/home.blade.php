@extends('layouts.app')
@push('body-class', 'home-bg')

@section('content')
<div id="info1">
  <div id="info">
    <h1>Tu-Do</h1>
    <h2>Simplify your life</h2>

    <img id="img" src="/img/logo.png" height="100px" weigth="100px" alt="Logo of the website a purple check composed by 2 rectangles">

    @if (!Auth::check())
      <a class="btn btn-primary" id="create" href="{{ url('/register') }}"> Create an account </a>
      <a class="btn btn-primary" id="login" href="{{ url('/login') }}"> Log in </a>
    @endif
  </div>
</div>
@endsection
