@extends('layouts.app')

@yield('content')

@section('content')

  <h1 class="page_name">Contacts</h1>
  <p style="margin: 50px; font-weight: normal; "> <a href="tel:22 508 1400"><i class="fa-solid fa-phone"></i></a> 22 508 1400 </p>
  <p style="margin: 50px; font-weight: normal; "> <a href="mailto:thisemaildoes@not.exist"><i class="fa-solid fa-envelope"> </i></a> thisemaildoes@not.exist</p>
@endsection
