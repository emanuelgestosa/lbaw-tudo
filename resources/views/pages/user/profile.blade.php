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
                      <i class="fa-solid fa-user"></i> <span class="ms-1 d-none d-sm-inline"> My Profile </span>
                    </a>
                  </li>  
                  <li class="nav-item">
                      <a tabindex="0" id="edit" href="{{ url('/user/'. $id. '/edit') }}" class="nav-link align-middle px-0">
                        <i class="fa-solid fa-pen-to-square"></i> <span class="ms-1 d-none d-sm-inline"> Edit Profile </span>
                      </a>
                  </li>  
                  <li class="nav-item">
                      <a tabindex="0" href="{{ url('user/' . $id . '/projects') }}" class="nav-link align-middle px-0">
                        <i class="fa-solid fa-diagram-project"></i> <span class="ms-1 d-none d-sm-inline"> My Projects</span>
                      </a>
                  </li> 
                  <li class="nav-item">
                      <a tabindex="0" href="{{ url('user/' . $id . '/favourites') }}" class="nav-link align-middle px-0">
                        <i class="fa-solid fa-star"></i> <span class="ms-1 d-none d-sm-inline"> My Favorites </span>
                      </a>
                  </li>   
                  <li class="nav-item">
                    <a tabindex="0" href="{{ url('user/' . $id . '/invites') }}" class="nav-link align-middle px-0">
                      <i class="fa-solid fa-envelopes-bulk"></i><span class="ms-1 d-none d-sm-inline"> My Invites </span>
                    </a>
                  </li>       
              </ul>
          </div>
        </nav>
      </div>
      @endif
      <div class="col py-3">
        <div class="flex-row">
          <h1 id="page_name">{{ ucfirst($name) }}'s Profile</h1>
        </div>
        <div class="container">
          <div id= "pfp">
          <img src="{{ asset('storage/profile_pics/'.$id) }}" alt="" title="" width=175 height=175>
          <!-- <img src="{{ url('storage/app/public/profile_pics/'.$id) }}" alt="" title=""> -->
          <!-- <img src="https://picsum.photos/175/175"> -->
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

