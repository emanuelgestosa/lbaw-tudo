@extends('layouts.app')
<link href="{{ asset('/css/common.css') }}" rel="stylesheet">
<link href="{{ asset('/css/project.css') }}" rel="stylesheet">

@yield('content')

@section('content')


<article class="project" id="project_content">

    <h1> {{ $project->title }} </h1>

    <h2> Project Description</h2>
    <p> {{$project->description}} </p>

    <section id="project_boards">
        <h3> Boards </h3>
        @foreach ($project->boards()->get() as $board)
        @include('partials.board.card',['board',$board])
        @endforeach
        <a class="button" href="{{ url('') }}"> Add board </a>
    </section>

    <ul id="project_collaborators">
        <section>
        <h3> Collaborators </h3>
            <a class="button" href="project/{{$project->id}}/invite">
                <i class="fa-solid fa-envelope"></i>
            </a>
        </section>

        @foreach ($project->collaborators()->get() as $collaborator)
        <a href="{{ url('/user/' . $collaborator->id) }}"> {{$collaborator->name}} </p>
        @endforeach
    </ul>

</article>


@endsection
