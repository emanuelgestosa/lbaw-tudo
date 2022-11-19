@extends('layouts.app')

@yield('content')

@section('content')

  <h1>My Projects<h1>
  <nav>
    <?php
      foreach ($projects as $projectId) { ?>
        <a href="">Project{{ $projectId }}</a>
      <?php }
    ?>
  </nav>
  <a class="button" href="">New Project</a>

@endsection
