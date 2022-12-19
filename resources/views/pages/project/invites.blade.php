@extends('layouts.app')
<link href="{{ asset('/css/project.css') }}" rel="stylesheet">
@yield('content')
@section('content')
<section>
<h2 class="page_name">Invites of {{$project->title}}</h2>
    <section class="invite-content" project-id="{{$project->id}}" user-id="{{Auth::user()->id}}">
    <section class="invite-list">
    @foreach ($project->invites()->get() as $invite) 
        <article class="project-invite-card">
            <p>{{$invite->inviter->name}} enviou convite para {{$invite->invited->name}}</p>
        </article>
    @endforeach
    </section>
    <section class="search-collaborator">
    <div class="search_bar">
      <i class="fa-solid fa-search"></i>
      <input class="search-user" type="text" placeholder="Search user...">
    </div>
    <section class="user-results"></section>
  </section>
</section>
</section>
@endsection
