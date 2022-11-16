@extends('layouts.app')

@yield('content')

@section('content')

<a class="button" href="{{ url('/login') }}"> Login </a>
<a class="button" href="{{ url('/register') }}"> Register </a>

@endsection
