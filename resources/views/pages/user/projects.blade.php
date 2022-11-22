@extends('layouts.app')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">

@yield('content')

@section('content')

  <h1 class="page_name">My Projects</h1>
  <nav class="items">
    @foreach($projects as $project)
      <a href="{{ url('/project/' . $project->id) }}">{{ $project->title }}</a>
    @endforeach
  </nav>
  <a class="button" href="{{ url('/user/' . $user_id . '/add_project') }}"><i class="fa-solid fa-plus"></i> New Project</a>

@endsection
