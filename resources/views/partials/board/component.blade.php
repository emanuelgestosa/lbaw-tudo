@extends('layouts.app')

@yield('content')

@section('content')

  <h1 class="page_name">{{$board->name}} </h1>
  <a class="btn btn-primary" href="/board/{{  $board->id }}/create"><i class="fa-solid fa-plus"></i> Create Column</a>
  <article class="board" id="{{$board->id}}">
    @foreach ($board->verticals()->get() as $vertical)
       @include('partials.vertical.component',['vertical',$vertical])
    @endforeach
  </article>

@endsection
