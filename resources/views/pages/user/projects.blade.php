@extends('layouts.app')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">

@yield('content')

@section('content')

  <h1>My Projects</h1>
  <nav class="items">
    @foreach($projects as $project)
      <a href="">{{ $project->title }}</a>
    @endforeach
  </nav>
  <a class="button" href="">New Project</a>

@endsection
