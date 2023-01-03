@extends('layouts.app')

@push('body-class', 'profile-bg')

@yield('content')

@section('content')
@if (Auth::check() && (Auth::user()->id == $id ||
    !empty(App\Models\Administrator::where('id_users', Auth::user()->id)->get()->all())))
<div class="container-fluid">
  <div class="row flex-nowrap">
      <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 shadow-sm shadow-lg" id="sidebarpro">
        <nav>
          <div class="d-flex flex-column align-items-center align-items-sm-start pt-2 text-white min-vh-100">
              <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-decoration-none">
                  <span class="fs-5 d-none d-sm-inline" id ="title_nav_lat">{{ ucfirst($username) }}</span>
              </a>
              <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                  <li class="nav-item here">
                    <a tabindex="0" id="edit" href="{{ url('/user/'. $id) }}" class="nav-link align-middle px-0">
                      <i class="fa-solid fa-user" alt="my profile"></i> <span class="ms-1 d-none d-sm-inline"> My Profile </span>
                    </a>
                  </li>  
                  <li class="nav-item">
                      <a tabindex="0" id="edit" href="{{ url('/user/'. $id. '/edit') }}" class="nav-link align-middle px-0">
                        <i class="fa-solid fa-pen-to-square" alt="edit my profile"></i> <span class="ms-1 d-none d-sm-inline"> Edit Profile </span>
                      </a>
                  </li>  
                  <li class="nav-item">
                      <a tabindex="0" href="{{ url('user/' . $id . '/projects') }}" class="nav-link align-middle px-0">
                        <i class="fa-solid fa-diagram-project" alt="my  projects"></i> <span class="ms-1 d-none d-sm-inline"> My Projects</span>
                      </a>
                  </li> 
                  <li class="nav-item">
                      <a tabindex="0" href="{{ url('user/' . $id . '/favourites') }}" class="nav-link align-middle px-0">
                        <i class="fa-solid fa-star" alt="my favourites"></i> <span class="ms-1 d-none d-sm-inline"> My Favorites </span>
                      </a>
                  </li>   
                  <li class="nav-item">
                    <a tabindex="0" href="{{ url('user/' . $id . '/invites') }}" class="nav-link align-middle px-0">
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
        <div class="flex-row">
          <h1 id="page_name">{{ ucfirst($name) }}'s Profile
          @if (!(!Auth::check() || (
                  empty(App\Models\Administrator::where('id_users', Auth::user()->id)->get()->all()))) )
          <a class="button btn btn-primary" href="/user/{{ $id }}/ban" style="background-color: ; color: white;" ><i class="fa-solid fa-ban"></i> Ban User</a></h1>
        @endif
        </div>
        <div class="container">
          <div id= "pfp">
          @if (Storage::disk('public')->exists("/profile_pics/".$id))
            <img src="{{ asset('storage/profile_pics/'.$id) }}" alt="Profile Pic" width=175 height=175>
          @else 
            <img src="/img/pfp_user/default.jpg" alt="Profile Pic" width=175 height=175>
          @endif 
            
          <!-- <img src="{{ asset('storage/profile_pics/'.$id) }}" alt="Profile Pic" width=175 height=175> -->
          </div>
          <ul id="contacts">
            <li><i class="fa-solid fa-at"></i> {{ $username }}</li>
            <li><i class="fa-solid fa-user"></i> {{ ucfirst($name) }}</li>
            <li><a class="text-decoration-none" href="mailto:{{$email}}"><i class="fa-solid fa-envelope"></i> {{ $email }}</a></li>
            <li><a href="tel:{{$phone_number}}"><i class="fa-solid fa-phone"></i> {{ $phone_number }}</a></li>
          </ul>
      </div>
    </div>
  </div>
</div>
@endsection

