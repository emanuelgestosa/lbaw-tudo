@extends('layouts.app')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">

@yield('content')

@section('content')
  <div id="user-info">
    <h1 id="usnm">{{ $username }}</h1>
    <div class= "pfp">
      <img src="https://picsum.photos/175/175">
    </div>
    <div id="contacts">
      <p><i class="fa-solid fa-user"></i> {{ $name }}</p>
      <p><i class="fa-solid fa-envelope"></i> {{ $email }}</p>
      <p><i class="fa-solid fa-phone"></i> {{ $phone_number }}</p>
    </div>

    <a class="button" id="edit" href="{{ url('/user/'. $id. '/edit') }}"><i class="fa-solid fa-pencil"></i> Edit Profile</a>
  </div>
  <nav class="right">
    <a class="button" href="{{ url('user/' . $id . '/favorites') }}"><i class="fa-solid fa-star"></i> My Favorites</a>
    <a class="button" href="{{ url('user/' . $id . '/calendar') }}"><i class="fa-solid fa-calendar"></i> My Calendar</a>
    <a class="button" href="{{ url('user/' . $id . '/projects') }}"><i class="fa-solid fa-diagram-project"></i> My Projects</a>
  </nav>

  <form method="post" action="/api/user/{{ $id }}/edit">
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <input type="hidden" name="id"  value="{{ $id }}" />
    <input type="text" name="username"  value="{{ $username }}" />
    <input type="text" name="name"  value="{{ $name }}" />
    <input type="text" name="phone_number"  value="{{ $phone_number }}" />
    <input type="email" name="email"  value="{{ $email }}" />

    <button type="submit">Send</button>
  </form>

@endsection
