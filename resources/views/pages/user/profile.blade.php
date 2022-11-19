@extends('layouts.app')

@yield('content')

@section('content')

  <h1>User {{ $id }}</h1>
  <div>
    <img src="">
    <p>Name Surname</p>
    <p>usermail@mail.com</p>
    <p>+351987654321</p>
    <a href="{{ url('/user/'. $id. '/edit') }}">Edit Profile</a>
  </div>
  <nav>
    <a href="{{ url('user/' . $id . '/favorites') }}">My Favorites</a>
    <a href="{{ url('user/' . $id . '/calendar') }}">My Calendar</a>
    <a href="{{ url('user/' . $id . '/projects') }}">My Projects</a>
  </nav>

@endsection
