@extends('layouts.app')
@push('body-class', 'project-bg')
@yield('content')

@section('content')


<article class="project" id="project_content">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 shadow-sm shadow-lg" id="sidebarpro">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline" id ="title_nav_lat">{{ $project->title }}</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link align-middle px-0">
                                <i class="fa fa-house"></i> <span class="ms-1 d-none d-sm-inline"> Boards</span>
                            </a>
                        </li>  
                        <li class="nav-item">
                            <a href="#" class="nav-link align-middle px-0">
                                <i class="fa-solid fa-users"></i> <span class="ms-1 d-none d-sm-inline"> Team</span>
                            </a>
                        </li>  
                        <li class="nav-item">
                            <a href="#" class="nav-link align-middle px-0">
                                <i class="fa-solid fa-user-plus"></i> <span class="ms-1 d-none d-sm-inline"> Invite </span>
                            </a>
                        </li>       
                    </ul>
                </div>
            </div>
            <div class="col py-3">
                <h3>Boards aqui?</h3>
               
                    
            </div>
        </div>
    </div>
</article>
@endsection

