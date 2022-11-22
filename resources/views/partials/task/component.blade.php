@extends('layouts.app')
<link href="{{ asset('/css/board.css') }}" rel="stylesheet">

@yield('content')

@section('content')

<article class="task-component" data-id="{{ $task->id }}">
  <h1 class="page_name"> Task - {{ $task->name}} </h1>
  <p class="page_due_date"> Due Date - {{ $task->due_date}} </p>
  <h3> {{$task->description}} </h3>
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
</article>

@endsection