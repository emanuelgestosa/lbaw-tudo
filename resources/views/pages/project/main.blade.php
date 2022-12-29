@extends('layouts.app')
<link href="{{ asset('/css/project.css') }}" rel="stylesheet">

@yield('content')

@section('content')


<article class="project" id="project_content">
    <h1 class="page_name"> {{ $project->title }} </h1>
    <div id="about_proj">
        <div id="proj_desc">
            <h2 class="subtitle"> <i class="fa-solid fa-file"></i> Project Description</h2>
    <p> {{$project->description}} </p>
        </div>

    <section id="project_boards">
        <h2 class="subtitle"> <i class="fa-solid fa-briefcase"></i> Boards <a class="btn btn-primary" href="{{ url('/project/'.$project->id.'/boards/create') }}"> Add board </a> </h2>
        <div class="boardboard">
        @foreach ($project->boards()->get() as $board)
        @include('partials.board.card',['board',$board])
        @endforeach
        </div>
    </section>

    <ul id="project_collaborators">
        <section>
             <h2 class="subtitle"><i class="fa-solid fa-people-group"></i> Collaborators 
             </h2>
             <a class="btn btn-primary" href="/project/{{$project->id}}/invites">
                <i class="fa-solid fa-envelope"></i> Invites
             </a>       
        </section>

        @foreach ($project->collaborators()->get() as $collaborator)
        <a href="{{ url('/user/' . $collaborator->id) }}"> {{$collaborator->name}} </a>
        @endforeach
    </ul>

    <a href="{{ route('fav_project', ['project_id' => $project->id]) }}">
    @if (! $project->collaborators()->wherePivot('id_project', $project->id)->wherePivot('id_users', Auth::id())->first()->pivot->favourite)
    <i class="fa-regular fa-star"></i> Favorite Project
    @else
    <i class="fa-solid fa-star"></i> Unfavorite Project
    @endif
    </a>

    </div>
</article>
@endsection

