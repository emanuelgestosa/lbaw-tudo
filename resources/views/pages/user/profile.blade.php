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

    @if (Auth::check() && (Auth::user()->id == $id ||
        !empty(App\Models\Administrator::where('id_users', Auth::user()->id)->get()->all())))
      <a class="btn btn-primary" id="edit" href="{{ url('/user/'. $id. '/edit') }}"><i class="fa-solid fa-pencil"></i> Edit Profile</a>
    @endif
  </div>
  @if (Auth::check() && Auth::user()->id == $id)
    <nav class="right">
      <a class="btn btn-primary" href="{{ url('user/' . $id . '/favorites') }}"><i class="fa-solid fa-star"></i> My Favorites</a>
      <a class="btn btn-primary" href="{{ url('user/' . $id . '/calendar') }}"><i class="fa-solid fa-calendar"></i> My Calendar</a>
      <a class="btn btn-primary" href="{{ url('user/' . $id . '/projects') }}"><i class="fa-solid fa-diagram-project"></i> My Projects</a>
      <a class="btn btn-primary" href="{{ url('user/' . $id . '/invites') }}"><i class="fa-solid fa-envelope"></i> My Invites</a>
    </nav>
  @endif

@endsection
