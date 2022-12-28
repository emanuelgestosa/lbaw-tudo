@extends('layouts.app')
<link href="{{ asset('/css/task.css') }}" rel="stylesheet">

@yield('content')

@section('content')

<section class= "main-content">
<article class="task-component" data-id="{{ $task->id }}">
  <h1 class="page_name"> Task - {{ $task->name}} </h1>
  <form method="post" action="/api/task/{{ $task->id }}">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="id"  value="{{ $task->id }}" />
  <input type="hidden" name="board_id"  value="{{ $task->vertical->id_board }}" />
  <button type="submit" style="background-color: green;border:none;">Done</button>
</form>
  <b> Due Date: {{ $task->due_date}} </b>
  <p></p>
  <b> Description: </b>
  <p> {{$task->description}} </p>
  <button id="togle-comments">Comments</button>
<section class="label-container">
        <b> Labels: </b>
        @foreach ($task->labels()->get() as $label)
          @include('partials.label.tag',['label'=>$label]) <br>
        @endforeach     
</section>
<br><br>
<h1 class="page_name"> Editar </h1>
<form method="post" action="/api/task/{{ $task->id }}">
  <input type="hidden" name="_method" value="PATCH">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="id"  value="{{ $task->id }}" />
  <label for="name">Name: </label>
  <input type="text" name="name"  value="{{ $task->name }}" />
  <label for="description">Description: </label>
  <input type="text" name="description"  value="{{ $task->description }}" />
  <label for="due_date">Due Date: </label>
  <input type="date" name="due_date" value="{{ $task->due_date }}" pattern="\d{4}-\d{2}-\d{2}">
  <button type="submit">Send</button>
</form>
</article>
<section class="comment-tab" closed>
<section class="comment-container">
        <b> Comments: </b>
        @foreach ($task->comments()->get() as $comment)
           @include('partials.comment.component',['comment'=>$comment])
        @endforeach
<input type="text" id="comment-input">
</section>
</section>
</section>
<style>
section.main-content{
    display:flex;
    row-gap: 1em;
}
article.task-component[showing-comments]{
    width:75vw;
}
section.comment-tab[closed]{
    display:none;
}
</style>
<script>
const toggleCommentsButton = document.querySelector("#togle-comments")
const  taskComponent= document.querySelector("article.task-component")
const commentTab = document.querySelector("section.comment-tab")
const commentInput = document.querySelector("input#comment-input")
commentInput.addEventListener("keypress",(e) =>{
    if(e.key == 'Enter'){
    console.log(commentInput.value)
    commentInput.value = ""
    }
})
const toggleComments = () =>{
    taskComponent.toggleAttribute("showing-comments")
    commentTab.toggleAttribute("closed")
}
toggleCommentsButton.addEventListener("click",toggleComments)
</script>
@endsection
