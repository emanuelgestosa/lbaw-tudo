@extends('layouts.app')
@push('body-class', 'project-bg')
@yield('content')

@section('content')
<article class="team" id="team-content">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 shadow-sm shadow-lg" id="sidebarpro">
              <nav>
                <div class="d-flex flex-column align-items-center align-items-sm-start pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline" id ="title_nav_lat">{{ $project->title }}</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a tabindex="0" id="edit" href="/project/{{$project->id}}" class="nav-link align-middle px-0">
                              <i class="fa-solid fa-diagram-project" alt="projects"></i> <span class="ms-1 d-none d-sm-inline"> Workspace </span>
                            </a>
                        </li>  
                        <li class="nav-item here">
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
                <h1 id="page_name">{{ $project->title }}'s Collaborators</h1>            
                <div class="container">
                    <div class="row g-3" id="team-cards">
                        <ul class="d-flex flex-wrap list-group" id="project-collaborators">
                            @foreach ($project->collaborators()->get() as $collaborator)
                            <div class="col-12 col-md-6 col-lg-4">    
                                <a href="{{ url('/user/' . $collaborator->id) }}"> 
                                    <li tabindex="0" class="list-group-item d-flex justify-content-between align-items-center text-truncate">
                                    @if (Storage::exists("/profile_pics/".$collaborator->id_users ))
                                    <img src="{{ asset('storage/profile_pics/'.$collaborator->id_users ) }}" alt="Profile Pic" width=175 height=175>
                                    @else 
                                    <img src="/img/pfp_user/default.jpg" alt="Profile Pic" width=175 height=175>
                                    @endif 
                                    {{ucfirst($collaborator->name)}} 
                                    </li>
                                </a>
                            </div>
                            @endforeach
                         </ul>
            </div>
        </div>
    </div>
</div>
</div>
</article>
@endsection
