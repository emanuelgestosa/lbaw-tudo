@extends('layouts.app')

@yield('content')

@section('content')

  <h1 id="page_name">Create Column</h1>
  <form id="add_project_form" method="POST" action="{{ '/api/board/'.$id.'/vertical' }}">
    {{ csrf_field() }}
  
    <input id="board_id" type="hidden" name="board_id" value="{{ $id }}" required>

    <label for="name">Name</label>
    <input id="name" type="text" name="name" value="" required autofocus>
  
    <button type="submit" class="btn btn-primary" >Save</button>
    <a href="{{ '/board/'.$id }}"> Cancel </a>
  </form>

@endsection


