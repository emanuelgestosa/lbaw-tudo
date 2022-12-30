<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!--Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a5b6fcde37.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        // Fix for Firefox autofocus CSS bug
        // See: http://stackoverflow.com/questions/18943276/html-5-autofocus-messes-up-css-loading/18945951#18945951
    </script>
    <script type="text/javascript" src={{ asset('js/app.js') }} defer></script>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  
</head>
  <body class="@stack('body-class')">
    <main>
      @if (Auth::check())
      <div class="container-nav">
        <nav class="navbar navbar-expand-md navbar-dark shadow">
          <a href="{{ url('/') }}" class="navbar-brand">
            <img src="/img/logo.png" alt="Tu-Do logo a goose made by origami" width="32" height="34"
            class="d-inline-block align-top"/>
            Tu-Do
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggleMobileMenu"
          aria-controls="toggleMobileMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse navbar-butto" id="toggleMobileMenu">
            <ul class="navbar-nav ms-auto">
              <li>
                <a class="nav-link" href="#"> <i class="fa fa-bell"></i> Notifications</a>

              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="pfp-nav">
                    <img src="https://picsum.photos/175/175"/> 
                  </div>
                  Me
                </a>
                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end shadow">
                  <li><a class="dropdown-item" href="{{ url('/user/'. Auth::user()->id) }}"> My Profile </a>
                  <li><a class="dropdown-item" href="{{ url('/user/'. Auth::user()->id . '/projects') }}"> My Projects </a>
                  <li><a class="dropdown-item" href="#">Calendar</a></li>
                  <li><a class="dropdown-item" href="{{ route('favourites', Auth::id()) }}">My Favorites</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{ url('/logout') }}"> <i class="fa fa-sign-out"></i> Logout </a> </li>
                </ul>
              </li>
          </div>
        </nav>
      </div>
      @endif

      @if (!Auth::check())
      <div class="container-nav">
        <nav class="navbar navbar-expand-md navbar-dark shadow">
          <a href="{{ url('/') }}" class="navbar-brand">
            <img src="/img/logo.png" alt="Tu-Do logo a goose made by origami" width="32" height="34"
            class="d-inline-block align-top"/>
            Tu-Do
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggleMobileMenu"
          aria-controls="toggleMobileMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse navbar-butto" id="toggleMobileMenu">
            <ul class="navbar-nav ms-auto">
              <li>
                <a class="nav-link" href="{{ url('/register') }}"> Register </a> 
              </li>
              <li>
                <a class="nav-link" href="{{ url('/login') }}"> Login </a>
              </li>
          </div>
        </nav>
      </div>
      @endif

      <section id="content">
        @yield('content')
      </section>
      <footer>
        <nav>
          <a href="{{ url('/faq') }}">FAQ</a>
          <a href="{{ url('/contacts') }}">Contacts</a>
          <a href="{{ url('/about') }}">About us</a>
        </nav>
      </footer>
    </main>
  </body>
</html>
