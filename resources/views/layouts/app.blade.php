<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/milligram.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a5b6fcde37.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        // Fix for Firefox autofocus CSS bug
        // See: http://stackoverflow.com/questions/18943276/html-5-autofocus-messes-up-css-loading/18945951#18945951
    </script>
    <script type="text/javascript" src={{ asset('js/app.js') }} defer>
</script>
  </head>
  <body>
    <main>
      <header>
        <div id="main_logo">
          <h1 class="principal"><img src="/img/logo.png" height="50px" alt="Design of a chicken with blue feathers"> <a href="{{ url('/') }}">Tu-Do</a></h1>
        </div>
        @if (Auth::check())
        <a class="button" href="{{ url('/logout') }}"> Logout </a> <a class="button" href="{{ url('/user/'. Auth::user()->id) }}">{{ Auth::user()->name }}</a>
        @endif
      </header>
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
