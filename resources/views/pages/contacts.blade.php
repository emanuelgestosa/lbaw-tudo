@extends('layouts.app')

@yield('content')

@section('content')

  <h1 class="page_name">Contacts</h1>
  <p style="margin: 50px; font-weight: normal; "> Phone Number:  <a href="tel:22 508 1400"><i class="fa-solid fa-phone"> 22 508 1400</i></a> </p>
  <p style="margin: 50px; font-weight: normal; "> Email Address: <a href="mailto:thisemaildoes@not.exist"><i class="fa-solid fa-envelope"> thisemaildoes@not.exist</i></a> </p>
@endsection
