@extends('layouts.app')
<script defer src="/js/project/invites.js"></script>
@push('body-class', 'project-bg')
@yield('content')
@section('content')

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
<section style="display:flex;flex-direction:column;justify-content:center">
    <h1 id="page_name">Invites of {{$project->title}}</h1>

    <section class="invite-content" project-id="{{$project->id}}" user-id="{{Auth::user()->id}}" style="display:flex;gap:5em;margin:auto;">
        <section class="project-invite-list">
            @foreach ($project->invites()->get() as $invite)
            <article class="project-invite-card" project-id="{{$project->id}}" invite-id="{{$invite->id}}">
                <p class="project-invite-card-title">{{$project->title}}</p>
                <p>
                    <a href="/user/{{$invite->inviter->id}}">{{$invite->inviter->name}}</a>
                    enviou convite para
                    <a href="/user/{{$invite->inviter->id}}">{{$invite->invited->name}}</a>
                </p>
                <button closed>Delete Invite</button>
            </article>
            @endforeach
        </section>
        <section class="search-collaborator">
            <div class="search_bar">
                <i class="fa-solid fa-search" alt="search"></i>
                <label for="search">Search user</label>
                <input class="search-user" type="text" placeholder="Search user..." id="search">
            </div>
            <section class="user-results" style="display:hidden"></section>
        </section>
    </section>

</section>
<style>
    section.project-invite-list {
        display: flex;
        flex-direction: column;
        gap: 0.5em;
    }

    article.project-invite-card {
        border: 1px solid blue;
        border-radius: 1em;
        padding: 1em;

    }
    article.project-invite-card > button[closed]{
    display:none;
    }
    p.project-invite-card-title {
        text-align: center;
        margin: 0;
        border-bottom: 1px solid blue;
    }
</style>
<script>
</script>
@endsection
