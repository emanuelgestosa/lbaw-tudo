@extends('layouts.app')
<script defer src="/js/project/invites.js"></script>
@yield('content')
@section('content')
<section style="display:flex;flex-direction:column;justify-content:center">
    <h2 class="page_name">Invites of {{$project->title}}</h2>

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
                <i class="fa-solid fa-search"></i>
                <input class="search-user" type="text" placeholder="Search user...">
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
