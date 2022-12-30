@extends('layouts.app')

@push('body-class', 'profile-bg')


@yield('content')

@section('content')
  <div id="user-info">
    <!--h1 id="usnm">{{ $username }}</h1-->

    <div id= "pfp">
      <img src="https://picsum.photos/175/175">
    </div>

    <ul id="contacts">
      <li><i class="fa-solid fa-at"></i> {{ $username }}</li>
      <li><i class="fa-solid fa-user"></i> {{ $name }}</li>
      <li><i class="fa-solid fa-envelope"></i> {{ $email }}</li>
      <li><i class="fa-solid fa-phone"></i> {{ $phone_number }}</li>
    </ul>
    
    @if (Auth::check() && (Auth::user()->id == $id ||
    !empty(App\Models\Administrator::where('id_users', Auth::user()->id)->get()->all())))
      <nav id="right">
        <a class="btn btn-primary" id="edit" href="{{ url('/user/'. $id. '/edit') }}"><i class="fa-solid fa-pencil"></i> Edit Profile</a>
        <a class="btn btn-primary" href="{{ url('user/' . $id . '/favorites') }}"><i class="fa-solid fa-star"></i> My Favorites</a>
        <a class="btn btn-primary" href="{{ url('user/' . $id . '/calendar') }}"><i class="fa-solid fa-calendar"></i> My Calendar</a>
        <a class="btn btn-primary" href="{{ url('user/' . $id . '/projects') }}"><i class="fa-solid fa-diagram-project"></i> My Projects</a>
        <a class="btn btn-primary" href="{{ url('user/' . $id . '/invites') }}"><i class="fa-solid fa-envelope"></i> My Invites</a>
      </nav>

      <!--article id="todo">
        To-Do
      <--/article-->
    @endif
  

  </div>
  
@endsection
