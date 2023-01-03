@extends('layouts.app')
@push('body-class', 'home-bg')

@section('content')
<div id="info">
  <h1>Tu-Do</h1>
  <h2>Simplify your life</h2>

  <img id="img" src="/img/logo.png" height="100px" width="100px" alt="Goose made by origami gradient from purple to pink">

  @if (!Auth::check())
    <a  tabindex="0" class="btn btn-primary" id="create" href="{{ url('/register') }}"> Create an account </a>
    <a  tabindex="0" class="btn btn-primary" id="login" href="{{ url('/login') }}"> Log in </a>
  @endif
</div>
@endsection
