@extends('layouts.app')

@push('body-class', 'profile-bg')

@yield('content')

@section('content')
@if (Auth::check() && (Auth::user()->id == $user->id ||
    !empty(App\Models\Administrator::where('id_users', Auth::user()->id)->get()->all())))
<div class="container-fluid">
  <div class="row flex-nowrap">
      <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 shadow-sm shadow-lg" id="sidebarpro">
        <nav>
          <div class="d-flex flex-column align-items-center align-items-sm-start pt-2 text-white min-vh-100">
              <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-decoration-none">
                  <span class="fs-5 d-none d-sm-inline" id ="title_nav_lat">{{ $user->username}}</span>
              </a>
              <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                  <li class="nav-item">
                    <a tabindex="0" id="edit" href="{{ url('/user/'. $user->id) }}" class="nav-link align-middle px-0">
                      <i class="fa-solid fa-user"></i> <span class="ms-1 d-none d-sm-inline"> My Profile </span>
                    </a>
                  </li>  
                  <li class="nav-item">
                      <a tabindex="0" id="edit" href="{{ url('/user/'. $user->id . '/edit') }}" class="nav-link align-middle px-0">
                        <i class="fa-solid fa-pen-to-square"></i> <span class="ms-1 d-none d-sm-inline"> Edit Profile </span>
                      </a>
                  </li>  
                  <li class="nav-item here">
                      <a tabindex="0" href="{{ url('user/' . $user->id . '/projects') }}" class="nav-link align-middle px-0">
                        <i class="fa-solid fa-diagram-project"></i> <span class="ms-1 d-none d-sm-inline"> My Projects</span>
                      </a>
                  </li> 
                  <li class="nav-item">
                      <a tabindex="0" href="{{ url('user/' . $user->id . '/favorites') }}" class="nav-link align-middle px-0">
                        <i class="fa-solid fa-star"></i> <span class="ms-1 d-none d-sm-inline"> My Favorites </span>
                      </a>
                  </li>   
                  <li class="nav-item">
                    <a tabindex="0" href="{{ url('user/' . $user->id . '/calendar') }}" class="nav-link align-middle px-0">
                      <i class="fa-solid fa-calendar"></i><span class="ms-1 d-none d-sm-inline"> My Calendar </span>
                    </a>
                  </li>       
                  <li class="nav-item">
                    <a tabindex="0" href="{{ url('user/' . $user->id . '/invites') }}" class="nav-link align-middle px-0">
                      <i class="fa-solid fa-envelopes-bulk"></i><span class="ms-1 d-none d-sm-inline"> My Invites </span>
                    </a>
                  </li>       
              </ul>
          </div>
        </nav>
      </div>
      @endif
      <div class="col py-3">
        <h1 class="page_name">My Projects         <a class="btn btn-primary" href="{{ url('/user/' . $user->id . '/add_project') }}"><i class="fa-solid fa-plus"></i> New Project</a>
          <div class="container"></h1>
          <div class="row g-3" id="project-cards">
            @foreach($projects as $project)
              <div class="col-12 col-md-6 col-lg-4">
                  <div class="card shadow">
                      <div class="card-body">
                        <h5 class="card-title"><a href="{{ url('/project/' . $project->id) }}">{{ $project->title }}</a> </h5>
                        <p class="card-text text-truncate" title="{{$project->description}}"> {{$project->description}} </p>
                        <a tabindex="0" href="{{ url('/project/' . $project->id) }}" class="btn btn-primary">See project</a>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>


      </div> 
    </div>
  </div>
@endsection
