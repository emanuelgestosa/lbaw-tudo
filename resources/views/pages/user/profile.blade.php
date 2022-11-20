@extends('layouts.app')

@yield('content')

@section('content')
  <h1>{{ $username }}</h1>
  <div>
    <img src="">
    <p><i class="fa-solid fa-user"></i> {{ $name }}</p>
    <p><i class="fa-solid fa-envelope"></i> {{ $email }}</p>
    <p><i class="fa-solid fa-phone"></i> {{ $phone_number }}</p>
    <a href="{{ url('/user/'. $id. '/edit') }}"><i class="fa-solid fa-pencil"></i> Edit Profile</a>
  </div>
  <nav>
    <a href="{{ url('user/' . $id . '/favorites') }}"><i class="fa-solid fa-star"></i> My Favorites</a>
    <a href="{{ url('user/' . $id . '/calendar') }}"><i class="fa-solid fa-calendar"></i> My Calendar</a>
    <a href="{{ url('user/' . $id . '/projects') }}"><i class="fa-solid fa-diagram-project"></i> My Projects</a>
  </nav>

@endsection
