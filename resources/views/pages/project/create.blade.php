@extends('layouts.app')

@yield('content')

@section('content')

<h1>Add Project</h1>
<form id="add_project_form" method="POST" action="{{ route('add_project', ['user_id' => $user->id]) }}">
  {{ csrf_field() }}

  <label for="title">Title*</label>
  <input id="project_title_field" type="text" name="title" value="" required autofocus>
  @if ($errors->has('title'))
  <div class="error">
    <p>{{ $errors->first('title') }}</p>
  </div>
  @endif

  <label for="description">Description</label>
  <input id="description" type="text" name="description">
  @if ($errors->has('description'))
  <div class="error">
    <p>{{ $errors->first('description') }}</p>
  </div>
  @endif

  <button type="submit" class="btn btn-primary">
    Save
  </button>
  <a id="cancel_button" href="{{ route('projects', ['id' => $user->id]) }}"> Cancel </a>
</form>

@endsection

