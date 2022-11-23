@extends('layouts.app')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">

@yield('content')

@section('content')

  <h1 class="page_name">My Invites</h1>
  <sectionclass="items">
    @foreach($invites as $invite)
      <article>
        <p>Invited by <a href="/user/{{ $invite->inviter->id }}">{{ $invite->inviter->name }}</a> to {{$invite->project->title}}</p>
        <a class="button" > Accept </a>
        <a class="button" > Decline </a>
      </article>
    @endforeach
  </nav>

@endsection
