@extends('layouts.app')

@yield('content')

@section('content')
  <h1>{{ $username }}</h1>
  <div>
    <img src="">
    <p>{{ $name }}</p>
    <p>{{ $email }}</p>
    <p>{{ $phone_number }}</p>
    <a href="{{ url('/user/'. $id. '/edit') }}">Edit Profile</a>
  </div>
  <nav>
    <a href="{{ url('user/' . $id . '/favorites') }}">My Favorites</a>
    <a href="{{ url('user/' . $id . '/calendar') }}">My Calendar</a>
    <a href="{{ url('user/' . $id . '/projects') }}">My Projects</a>
  </nav>

@endsection
