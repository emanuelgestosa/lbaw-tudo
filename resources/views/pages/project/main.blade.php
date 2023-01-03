@extends('layouts.app')
@push('body-class', 'project-bg')
@yield('content')

@section('content')


<article class="project" id="project_content">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 shadow-sm shadow-lg" id="sidebarpro">
              <nav>
                <div class="d-flex flex-column align-items-center align-items-sm-start pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline" id ="title_nav_lat">{{ $project->title }}</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item here">
                            <a tabindex="0" id="edit" href="/project/{{$project->id}}" class="nav-link align-middle px-0">
                              <i class="fa-solid fa-diagram-project" alt="diagram project"></i> <span class="ms-1 d-none d-sm-inline"> Workspace </span>
                            </a>
                        </li>  
                        <li class="nav-item">
                            <a tabindex="0" href="/project/{{$project->id}}/team" class="nav-link align-middle px-0">
                              <i class="fa-solid fa-users" alt="team"></i> <span class="ms-1 d-none d-sm-inline"> Team </span>
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a tabindex="0" href="/project/{{$project->id}}/invites" class="nav-link align-middle px-0">
                              <i class="fa-solid fa-user-plus" alt="invite"></i> <span class="ms-1 d-none d-sm-inline"> Invite </span>
                            </a>
                        </li>     
                    </ul>
                </div>
              </nav>
            </div>
            <div class="col py-3">
              <div class="flex-row">
                <h1 id="page_name">{{ $project->title }}'s Workspace <a  class= "btn btn-primary" href="{{ route('fav_project', ['project_id' => $project->id]) }}">
                    @if (! $project->collaborators()->wherePivot('id_project', $project->id)->wherePivot('id_users', Auth::id())->first()->pivot->favourite)
                    <i class="fa-regular fa-star"></i> Favorite Project
                    @else
                    <i class="fa-solid fa-star"></i> Unfavorite Project
                    @endif
                    </a>
                </h1>     
              </div>
              <div class="d-flex text-truncate list-group">    
                <div class="col-12 col-md-6 col-lg-4">   
                <a href="{{ url('/user/' . $project->id_coordinator ) }}"> 
                    <li tabindex="0" class="list-group-item d-flex justify-content-between align-items-center text-truncate">
                        <img class="pfp-team" src="https://picsum.photos/175/175" alt="profile picture"> Coordinator
                    </li>
                  </div>
                </a>
                </div>
                <h2>Boards
                  <a class="btn btn-primary" href="{{ url('/project/'.$project->id.'/boards/create') }}"> Add board </a> 
                </h2>
                <div class="container">
                  <div class="row g-3" id="board-cards">
                  @foreach ($project->boards()->get() as $board)
                      <div class="col-12 col-md-6 col-lg-4">
                             @include('partials.board.card',['board',$board])
                      </div>
                      @endforeach
                  </div>
              </div>
            </div> 
          </div>
        </div>
      </article>
@endsection
