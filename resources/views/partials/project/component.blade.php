@extends('layouts.app')
<link href="{{ asset('/css/common.css') }}" rel="stylesheet">

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
    </section>

</article>


@endsection