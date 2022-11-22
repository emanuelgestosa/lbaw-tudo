@extends('layouts.app')
<link href="{{ asset('css/common.css') }}" rel="stylesheet">

@yield('content')

@section('content')

<h1>Add Task</h1>
<form id="add_task_form" method="POST" action="{{ route('add_task', ['vertical_id' => $vertical->id]) }}">
  {{ csrf_field() }}

  <label for="name">Name*</label>
  <input id="task_name_field" type="text" name="name" value="" required autofocus>

  <label for="description">Description</label>
  <input id="description" type="text" name="description">
  <label for="due_date">Due_date</label>
  <input id="due_date" type="date" name="due_date" min="{{date('Y-m-d', strtotime('+1 days'))}}" value="" pattern="\d{4}-\d{2}-\d{2}" >

  <button type="submit">
    Save
  </button>

  <a href="{{ route('board', ['id' => $vertical->id_board]) }}"> Cancel </a>
</form>

@endsection