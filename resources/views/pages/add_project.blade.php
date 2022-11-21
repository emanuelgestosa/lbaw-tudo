@extends('layouts.app')
<link href="{{ asset('css/common.css') }}" rel="stylesheet">

@yield('content')

@section('content')

<h1>Add Project</h1>
<form id="add_project_form" method="POST" action="{{ route('add_project', ['user_id' => $user->id]) }}">
  {{ csrf_field() }}

  <label for="title">Title</label>
  <input id="project_title_field" type="text" name="title" value="" required autofocus>

  <label for="description">Description</label>
  <input id="description" type="text" name="description">

  <button type="submit">
    Save
  </button>
</form>

@endsection