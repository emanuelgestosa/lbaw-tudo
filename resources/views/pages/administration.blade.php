@extends('layouts.app')

@yield('content')

@section('content')

  <h1 class="page_name">Administration Panel</h1>
  <section id="user-administration">
    <h2>User administration</h2>
    <a class="button" href=""><i class="fa-solid fa-plus" style="font-size:150%;"></i> Create User</a>
    <div class="search_bar">
      <i class="fa-solid fa-search"></i>
      <input type="text" placeholder="Search user...">
    </div>
  </section>

@endsection
