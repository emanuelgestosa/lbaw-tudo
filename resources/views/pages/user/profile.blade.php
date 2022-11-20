@extends('layouts.app')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">

@yield('content')

@section('content')
  <div id="user-info">
    <h1>{{ $username }}</h1>
    <img src="/img/logo.png" alt="Design of a chicken with blue feathers">
    <div id="contacts">
      <p><i class="fa-solid fa-user"></i> {{ $name }}</p>
      <p><i class="fa-solid fa-envelope"></i> {{ $email }}</p>
      <p><i class="fa-solid fa-phone"></i> {{ $phone_number }}</p>
    </div>

    <a class="button" href="{{ url('/user/'. $id. '/edit') }}"><i class="fa-solid fa-pencil"></i> Edit Profile</a>
  </div>
  <nav class="right">
    <a class="button" href="{{ url('user/' . $id . '/favorites') }}"><i class="fa-solid fa-star"></i> My Favorites</a>
    <a class="button" href="{{ url('user/' . $id . '/calendar') }}"><i class="fa-solid fa-calendar"></i> My Calendar</a>
    <a class="button" href="{{ url('user/' . $id . '/projects') }}"><i class="fa-solid fa-diagram-project"></i> My Projects</a>
  </nav>

@endsection
