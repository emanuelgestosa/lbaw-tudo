@extends('layouts.app')

@yield('content')

@section('content')

<h1 class="page_name">Invites</h1>
<article class="invite" id="{{$invite->id}}">

    @foreach ($invite->project_name()->get() as $proj_name)
        
    @endforeach
</article>


@endsection