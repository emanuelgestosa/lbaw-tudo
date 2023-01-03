@extends('layouts.app')

@push('body-class', 'profile-bg')

@yield('content')

@section('content')
  <form class="form-group" method="POST" action="/action/ban/">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  
    <input type="hidden" name="id_users" value="{{ $id_users }}" />
    <input type="hidden" name="id_administrator" value="{{ $id_administrator }}" />

    <label for="reason">Reason</label>
    <input type="text" name="reason"/>

    <label for="end_date">End Date: </label>
    <input type="date" name="end_date" required="true" pattern="\d{4}-\d{2}-\d{2}">

    <button type="submit" class="btn btn-primary"> Ban</button>
  </form>
@endsection

