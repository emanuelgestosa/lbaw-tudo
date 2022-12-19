@extends('layouts.app')

@yield('content')

@section('content')

  <h1 class="page_name">Administration Panel</h1>
  <section id="user-administration">
    <h2>User administration</h2>
    <a class="button" href="/admins/create"><i class="fa-solid fa-plus" style="font-size:150%;"></i> Create User</a>
    <div class="search_bar">
      <i class="fa-solid fa-search"></i>
      <input class="search-user" type="text" placeholder="Search user...">
    </div>
    <section class="user-results" style="display:hidden"></section>
  </section>

@endsection
