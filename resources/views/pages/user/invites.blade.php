@extends('layouts.app')
@push('body-class', 'profile-bg')
<script defer src="/js/user/invites.js"></script>
@yield('content')

@section('content')
@if (Auth::check() && (Auth::user()->id == $user->id ||
    !empty(App\Models\Administrator::where('id_users', Auth::user()->id)->get()->all())))
<div class="container-fluid">
  <div class="row flex-nowrap">
      <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 shadow-sm shadow-lg" id="sidebarpro">
        <nav>
          <div class="d-flex flex-column align-items-center align-items-sm-start pt-2 text-white min-vh-100">
              <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-decoration-none">
                  <span class="fs-5 d-none d-sm-inline" id ="title_nav_lat">{{ ucfirst($user->username)}}</span>
              </a>
              <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                  <li class="nav-item">
                    <a tabindex="0" id="edit" href="{{ url('/user/'. $user->id) }}" class="nav-link align-middle px-0">
                      <i class="fa-solid fa-user" alt="my profile"></i> <span class="ms-1 d-none d-sm-inline"> My Profile </span>
                    </a>
                  </li>  
                  <li class="nav-item">
                      <a tabindex="0" id="edit" href="{{ url('/user/'. $user->id . '/edit') }}" class="nav-link align-middle px-0">
                        <i class="fa-solid fa-pen-to-square" alt="edit my profile"></i> <span class="ms-1 d-none d-sm-inline"> Edit Profile </span>
                      </a>
                  </li>  
                  <li class="nav-item">
                      <a tabindex="0" href="{{ url('user/' . $user->id . '/projects') }}" class="nav-link align-middle px-0">
                        <i class="fa-solid fa-diagram-project" alt="my projects"></i> <span class="ms-1 d-none d-sm-inline"> My Projects</span>
                      </a>
                  </li> 
                  <li class="nav-item">
                      <a tabindex="0" href="{{ url('user/' . $user->id . '/favourites') }}" class="nav-link align-middle px-0">
                        <i class="fa-solid fa-star" alt="my favourites"></i> <span class="ms-1 d-none d-sm-inline"> My Favorites </span>
                      </a>
                  </li>    
                  <li class="nav-item here">
                    <a tabindex="0" href="{{ url('user/' . $user->id . '/invites') }}" class="nav-link align-middle px-0">
                      <i class="fa-solid fa-envelopes-bulk" alt="my invites"></i><span class="ms-1 d-none d-sm-inline"> My Invites </span>
                    </a>
                  </li>       
                  @if (!(!Auth::check() || (
                    Auth::check() &&
                  empty(App\Models\Administrator::where('id_users', Auth::user()->id)->get()->all()))) )
                  <li class="nav-item">
                    <a href="{{ url('/admins') }}" class="nav-link align-middle px-0">
                      <i class="fa-solid fa-tools"></i><span class="ms-1 d-none d-sm-inline"> Admin Panel </span>
                    </a>
                  </li>       
                  @endif
              </ul>
          </div>
        </nav>
      </div>
      @endif
      <div class="col py-3">
        <h1 id="page_name"> My Invites </h1>
          <div class="container">
          <div class="row g-3" id="project-cards">
            @foreach($invites as $invite)
            <article class="col-12 col-md-6 col-lg-4">
              <div class="card shadow">
                <div class="card-body">
                  <h5 class="card-title"><i class="fa fa-envelope"></i>  Invite</h5>
              <p class="card-text text-truncate" title="You were invited by {{ $invite->inviter->name }} to the {{$invite->project->title}} project">
                You were invited by <a class="text-decoration-underline" href="/user/{{ $invite->inviter->id }}">{{ $invite->inviter->name }}</a> to the {{$invite->project->title}} project
              </p>
              <form class="d-inline">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
      
                <input type="hidden" name="userId"  value="{{ $invite->invited->id }}" />
                <input type="hidden" name="inviteId"  value="{{ $invite->id }}" />
      
                <button id="accept"  class="btn btn-primary" type="submit" style="background-color:rgb(44, 164, 104); border-style: none;"> Accept </button>
              </form>
      
              <form class="d-inline">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
      
                <input type="hidden" name="userId"  value="{{ $invite->invited->id }}" />
                <input type="hidden" name="inviteId"  value="{{ $invite->id }}" />
                <button id="decline" type="submit" class="btn btn-primary" style="background-color:rgb(223, 33, 59); border-style: none;"> Decline </button>
              </form>

            </article>
          @endforeach
          </div>
      </div>
    </div> 
  </div>
@endsection



