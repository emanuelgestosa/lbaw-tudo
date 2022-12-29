@extends('layouts.app')

@yield('content')

@section('content')

  <h1 class="page_name">My Favourite Projects</h1>


  <nav class="items">
    @foreach($projects as $project)
      <a href="{{ url('/project/' . $project->id) }}">{{ $project->title }}</a>
    @endforeach
  </nav>

@endsection
