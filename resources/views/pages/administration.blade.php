@extends('layouts.app')

@section('page-scripts')
  <script defer src="/js/admin.js"></script>
@endsection

<script defer src="/js/user/administration.js"></script>
@yield('content')

@section('content')

  <h1 class="page_name">Administration Panel</h1>
  <div id="panel">
    <nav id="tabs">
      <button id="tab-user" class="tab selected"><i class="fa-solid fa-user"></i> User</button>
      <button id="tab-project" class="tab"><i class="fa-solid fa-project-diagram"></i> Project</button>
    </nav>
    <nav id="sub-tabs">
      <button id="sub-tab-bans" class="sub-tab selected"><i class="fa-solid fa-ban"></i> Banned Users</button>
      <button id="sub-tab-createuser" class="sub-tab"><i class="fa-solid fa-plus"></i> Create User</button>
      <button id="sub-tab-searchuser" class="sub-tab"><i class="fa-solid fa-search"></i> Search User</button>
    </nav>
    <div id="tab-content">
    </div>
  </div>

@endsection
