@extends('layouts.app')
<link href="{{ asset('/css/task.css') }}" rel="stylesheet">

@yield('content')

@section('content')

<article class="task-component" data-id="{{ $task->id }}">
  <h1 class="page_name"> Task - {{ $task->name}} </h1>
  <b> Due Date: {{ $task->due_date}} </b>
  <p></p>
  <b> Description: </b>
  <p> {{$task->description}} </p>
<section class="label-container">
        <b> Labels: </b>
        @foreach ($task->labels()->get() as $label)
          @include('partials.label.tag',['label'=>$label]) <br>
        @endforeach     
</section>
<section class="comment-container">
        <b> Comments: </b>
        @foreach ($task->comments()->get() as $comment)
           @include('partials.comment.component',['comment'=>$comment])
        @endforeach
</section>
<br><br>
<h1 class="page_name"> Editar </h1>
<form method="post" action="/api/tasks/{{ $task->id }}">
  <input type="hidden" name="_method" value="PATCH">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <input type="hidden" name="id"  value="{{ $task->id }}" />
  <input type="text" name="name"  value="{{ $task->name }}" />
  <input type="text" name="description"  value="{{ $task->description }}" />
  <input type="text" name="due_date"  value="{{ $task->due_date }}" />
  <input type="integer" name="id_vertical"  value="{{ $task->id_vertical }}" />

  <button type="submit">Send</button>
</form>


</article>

@endsection