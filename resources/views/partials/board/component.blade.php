@extends('layouts.app')
<link href="{{ asset('/css/board.css') }}" rel="stylesheet">

@yield('content')

@section('content')

<h1 class="page_name">{{$board->name}} </h1>
<article class="board" id="{{$board->id}}">

    @foreach ($board->verticals()->get() as $vertical)
       @include('partials.vertical.component',['vertical',$vertical])
    @endforeach
</article>


@endsection