@extends('layouts.app')

@yield('content')

@section('content')

  <h1 class="page_name">Create Board</h1>
  <form id="add_project_form" method="POST" action="{{ '/api/project/'.$id.'/board' }}">
    {{ csrf_field() }}
  
    <input id="project_id" type="hidden" name="project_id" value="{{ $id }}" required>

    <label for="name">Name</label>
    <input id="name" type="text" name="name" value="" required autofocus>
  
    <button type="submit">Save</button>
    <a href="{{ '/project/'.$id.'/boards' }}"> Cancel </a>
  </form>

@endsection

