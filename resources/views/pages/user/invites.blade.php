@extends('layouts.app')
<script defer src="/js/user/invites.js"></script>


@yield('content')

@section('content')

  <h1 class="page_name">My Invites</h1>
  <section class="items">
    @foreach($invites as $invite)
      <article>
        <p>Invited by <a href="/user/{{ $invite->inviter->id }}">{{ $invite->inviter->name }}</a> to {{$invite->project->title}}</p>
        <form>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <input type="hidden" name="userId"  value="{{ $invite->invited->id }}" />
          <input type="hidden" name="inviteId"  value="{{ $invite->id }}" />

          <button id="accept"  class="btn btn-primary" type="submit"> Accept </button>
        </form>

        <form>
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <input type="hidden" name="userId"  value="{{ $invite->invited->id }}" />
          <input type="hidden" name="inviteId"  value="{{ $invite->id }}" />
          <button id="decline" type="submit" class="btn btn-primary"> Decline </button>
      </article>
    @endforeach
@endsection
