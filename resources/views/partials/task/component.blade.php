@extends('layouts.app')
<link href="{{ asset('/css/task.css') }}" rel="stylesheet">
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script defer src="/js/task/comments.js"></script>
@yield('content')

@section('content')

<section class="main-content">
    <article class="task-component" data-id="{{ $task->id }}">
        <h1 class="page_name"> Task - {{ $task->name}} </h1>
        <form method="post" action="/api/task/{{ $task->id }}">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{ $task->id }}" />
            <input type="hidden" name="board_id" value="{{ $task->vertical->id_board }}" />
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
        <h1 id="page_name"> Editar </h1>
        <form method="post" action="/api/task/{{ $task->id }}">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{ $task->id }}" />
            <label for="name">Name: </label>
            <input type="text" name="name" value="{{ $task->name }}" />
            <label for="description">Description: </label>
            <input type="text" name="description" value="{{ $task->description }}" />
            <label for="due_date">Due Date: </label>
            <input type="date" name="due_date" value="{{ $task->due_date }}" pattern="\d{4}-\d{2}-\d{2}">
            <button type="submit">Send</button>
        </form>
    </article>
    <section class="comment-tab" closed>
        <section>
        <div id="message-list" class="px-4 py-5 chat-box bg-white">
        </div>
        <input type="text" user-id="{{Auth::user()->id}}" task-id="{{$task->id}}" id="comment-input" placeholder="Type a message">
        </section>
    </section>
</section>
<style>
    ::-webkit-scrollbar {
        width: 5px;
    }

    ::-webkit-scrollbar-track {
        width: 5px;
        background: #f5f5f5;
    }

    ::-webkit-scrollbar-thumb {
        width: 1em;
        background-color: #ddd;
        outline: 1px solid slategrey;
        border-radius: 1rem;
    }

    .text-small {
        font-size: 0.9rem;
    }

    .messages-box,
    .chat-box {
        height: 510px;
        overflow-y: scroll;
    }

    .rounded-lg {
        border-radius: 0.5rem;
    }

    input::placeholder {
        color: #999;
    }

    section.main-content {
        display: flex;
        row-gap: 1em;
    }

    article.task-component[showing-comments] {
        width: 75vw;
    }

    section.comment-tab{
        display:flex;
        justify-content:center;
        align-items:center;
        padding:3em;
    }
    section.comment-tab[closed] {
        display: none;
    }
</style>
@endsection
