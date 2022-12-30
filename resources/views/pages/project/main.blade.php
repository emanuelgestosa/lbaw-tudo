@extends('layouts.app')
@push('body-class', 'project-bg')
@yield('content')

@section('content')


<article class="project" id="project_content">
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box px-3 pt-3 pb-4">
                <h1 class="page_name text-dark"> {{ $project->title }} </h1>
            </div>

            <ul class="list-unstyled px-2">
                <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"> <i class="fa fa-table"></i> Boards </a></li>
                <li class=""><a href="#" class="text-decoration-none d-flex justify-content-between">
                    <span> <i class="fa fa-users"></i> Team </span>
                    <span class="bg-dark rounded-pill text-white py-0 px-2"> 23 </span> 
                </a> 
                </li>
            </ul>
            <hr class="h-color mx-3">
            <ul class="list-unstyled px-2">
                <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"> <i class="fa fa-envelope"></i> Invite </a></li>
            </ul>

        </div>

        <div class="content">

        </div>
    </div>
</article>
@endsection

