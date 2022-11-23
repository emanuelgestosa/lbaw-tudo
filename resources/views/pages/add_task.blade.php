@extends('layouts.app')
<link href="{{ asset('css/common.css') }}" rel="stylesheet">

@yield('content')

@section('content')

<h1>Add Task</h1>
<form id="add_task_form" method="POST" action="{{ route('add_task', ['vertical_id' => $vertical->id]) }}">
  {{ csrf_field() }}

  <label for="name">Name*</label>
  <input id="task_name_field" type="text" name="name" required autofocus>
  @if ($errors->has('name'))
  <div class="error">
    <p>{{ $errors->first('name') }}</p>
  </div>
  @endif

  <label for="description">Description</label>
  <input id="description" type="text" name="description">
  @if ($errors->has('description'))
  <div class="error">
    <p>{{ $errors->first('description') }}</p>
  </div>
  @endif

  <label for="due_date">Due_date</label>
  <input id="due_date" type="date" name="due_date" value="" pattern="\d{4}-\d{2}-\d{2}">
  @if ($errors->has('due_date'))
  <div class="error">
    <p>{{ $errors->first('due_date') }}</p>
  </div>
  @endif


  <button type="submit">
    Save
  </button>

  <a href="{{ route('board', ['id' => $vertical->id_board]) }}"> Cancel </a>
</form>

@endsection