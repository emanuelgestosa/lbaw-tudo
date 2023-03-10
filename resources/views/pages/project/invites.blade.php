@extends('layouts.app')
<script defer src="/js/project/invites.js"></script>
@push('body-class', 'project-bg')
@yield('content')
@section('content')
<meta project-id="{{$project->id}}" user-id="{{Auth::user()->id}}"></meta>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 shadow-sm shadow-lg" id="sidebarpro">
            <nav>
                <div class="d-flex flex-column align-items-center align-items-sm-start pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline" id="title_nav_lat">{{ $project->title }}</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a tabindex="0" id="edit" href="/project/{{$project->id}}" class="nav-link align-middle px-0">
                                <i class="fa-solid fa-diagram-project" alt="diagram project"></i> <span class="ms-1 d-none d-sm-inline"> Workspace </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a tabindex="0" href="/project/{{$project->id}}/team" class="nav-link align-middle px-0">
                                <i class="fa-solid fa-users" alt="team"></i> <span class="ms-1 d-none d-sm-inline"> Team </span>
                            </a>
                        </li>
                        <li class="nav-item here">
                            <a tabindex="0" href="/project/{{$project->id}}/invites" class="nav-link align-middle px-0">
                                <i class="fa-solid fa-user-plus" alt="invite"></i> <span class="ms-1 d-none d-sm-inline"> Invite </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="col py-3">
            <h1 id="page_name">Invites of {{$project->title}}

                <section class="search-collaborator form-group" style="max-width: 300px;">
                    <div class="search_bar">
                        <input class="search-user form-control" type="text" placeholder="Search user...">
                    </div>
                    <section class="user-results" style="display:hidden"></section>
                </section>
            </h1>
            <div class="container">
                <div class="row g-3" id="project-cards">
                </div>
            </div>
 @endsection
