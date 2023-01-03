@extends('layouts.app')
@push('body-class', 'project-bg board-bg')

@yield('content')

@section('content')


<article class="project" id="board-content">
  <div class="container-fluid">
      <div class="row flex-nowrap">
          <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 shadow-sm shadow-lg" id="sidebarpro">
            <nav>
              <div class="d-flex flex-column align-items-center align-items-sm-start pt-2 text-white min-vh-100">
                  <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-decoration-none">
                      <span class="fs-5 d-none d-sm-inline" id ="title_nav_lat">titulo do projeto</span>
                  </a>
                  <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                      <li class="nav-item here">
                        <a tabindex="0" href="#" class="nav-link align-middle px-0">
                          <i class="fa-solid fa-clapperboard"></i> <span class="ms-1 d-none d-sm-inline"> {{$board->name}} </span>
                        </a>
                      </li>  
                      <li class="nav-item">
                          <a tabindex="0" href="/project/{{$board->id_project}}" class="nav-link align-middle px-0">
                            <i class="fa-solid fa-diagram-project"></i> <span class="ms-1 d-none d-sm-inline">  Back to Workspace </span>
                          </a>
                      </li>  
                      <li class="nav-item">
                          <a tabindex="0" href="/project/{{$board->id_project}}/team" class="nav-link align-middle px-0">
                            <i class="fa-solid fa-users"></i> <span class="ms-1 d-none d-sm-inline"> Team </span>
                          </a>
                      </li> 
                      <li class="nav-item">
                          <a tabindex="0" href="/project/{{$board->id_project}}/invites" class="nav-link align-middle px-0">
                            <i class="fa-solid fa-user-plus"></i> <span class="ms-1 d-none d-sm-inline"> Invite </span>
                          </a>
                      </li>     
                  </ul>
              </div>
            </nav>
          </div>
          <div class="col py-3">
            <div class="flex-row">
                <h1 id="page_name">{{$board->name}} 
                  <a class="btn btn-primary" href="/board/{{  $board->id }}/create"><i class="fa-solid fa-plus"></i> Create Column</a>
                </h1>
                <div class="container">
                  <div class="row g-3" id="board-cards">
                    <article class="board d-flex" id="{{$board->id}}">
                      @foreach ($board->verticals->sortBy('order_board') as $vertical)
                        @include('partials.vertical.component',['vertical',$vertical, 'board', $board])
                      @endforeach
                    </article>

              @endsection

              <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js" defer></script>
              <script src="/js/project/tasks-sortable.js" defer> </script>
