
@extends('layouts.app')
@push('body-class', 'project-bg')


<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script defer src="/js/task/comments.js"></script>
@yield('content')
@section('content')


<article class="project" id="task-content">
  <div class="container-fluid">
      <div class="row flex-nowrap">
          <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 shadow-sm shadow-lg" id="sidebarpro">
            <nav>
              <div class="d-flex flex-column align-items-center align-items-sm-start pt-2 text-white min-vh-100">
                  <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-decoration-none">
                      <span class="fs-5 d-none d-sm-inline " id ="title_nav_lat">Task: {{$task->name}}</span>
                  </a>
                  <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                      <li class="nav-item">
                        <a tabindex="0" href="/board/{{$task->vertical->id_board}}" class="nav-link align-middle px-0">
                          <i class="fa-solid fa-clapperboard"></i> <span class="ms-1 d-none d-sm-inline"> Back to Board </span>
                        </a>
                      </li>  
                      <li class="nav-item">
                          <a tabindex="0" href="/project/{{$task->vertical->project}}" class="nav-link align-middle px-0">
                            <i class="fa-solid fa-diagram-project"></i> <span class="ms-1 d-none d-sm-inline">  Back to Workspace </span>
                          </a>
                      </li>  
                      <li class="nav-item">
                          <a tabindex="0" href="/project/{{$task->vertical->project->id_project}}/team" class="nav-link align-middle px-0">
                            <i class="fa-solid fa-users"></i> <span class="ms-1 d-none d-sm-inline"> Team </span>
                          </a>
                      </li> 
                      <li class="nav-item">
                          <a tabindex="0" href="/project/{{$task->vertical->project->id_project}}/invites" class="nav-link align-middle px-0">
                            <i class="fa-solid fa-user-plus"></i> <span class="ms-1 d-none d-sm-inline"> Invite </span>
                          </a>
                      </li>     
                  </ul>
              </div>
            </nav>
          </div>
          <div class="col py-3">
            <div class="flex-row">
                <h1 id="page_name">Task - {{$task->name}} </h1>
                    <article class="task-component" data-id="{{ $task->id }}">
                        <div class="card" style="max-width: 300px;">
                            <div class="card-body">
                              <h5 class="card-title">{{$task->name}}</h5>
                              <p class="card-text"> {{$task->description}}  </p>
                              <p class="blockquote-footer"> Due Date: {{ $task->due_date}}</p>
                              <p class="blockquote-footer"> Labels: 
                                @foreach ($task->labels()->get() as $label)
                                    @include('partials.label.tag',['label'=>$label])
                                @endforeach
                             </p>
                              <button class="btn btn-primary" id="togle-comments"><i class="fas fa-comments"></i> Comments</button>
                            </div>
                          </div>
<br>
                        <h3> Edit Task 
                            <form method="post" action="/api/task/{{ $task->id }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="{{ $task->id }}" />
                                <input type="hidden" name="board_id" value="{{ $task->vertical->id_board }}" />
                                <button class="btn btn-primary" type="submit" style="background-color: rgb(167, 22, 22);border:none;"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </h3>
                        <div id="edit-profile-forms" style="max-width: 300px;">
                        <form class="form-group" method="post" action="/api/task/{{ $task->id }}">
                            <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $task->id }}" />
                            <label for="name">Name: </label>
                            <input class="form-control" type="text" name="name" value="{{ $task->name }}" />
                            <label for="description">Description: </label>
                            <input class="form-control" type="text" name="description" value="{{ $task->description }}" />
                            <label for="due_date">Due Date: </label>
                            <input class="form-control" type="date" name="due_date" value="{{ $task->due_date }}" pattern="\d{4}-\d{2}-\d{2}">
                            <button class="btn btn-primary" type="submit">Send</button>
                        </form>
                    </article>
                    <section class="comment-tab"  closed>
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





