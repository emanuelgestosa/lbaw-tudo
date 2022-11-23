@extends('layouts.app')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">

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

          <button id="accept" type="submit"> Accept </button>
        </form>

        <form>
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <input type="hidden" name="userId"  value="{{ $invite->invited->id }}" />
          <input type="hidden" name="inviteId"  value="{{ $invite->id }}" />
          <button id="decline" type="submit"> Decline </button>
      </article>
    @endforeach
 <script src ="/public/js/globals.js"></script>   
<script>
  const acceptButtons = document.querySelectorAll('#accept')
  for (const acceptButton of acceptButtons) {
    acceptButton.addEventListener('click',() => {
      const inviteId = acceptButton.parentElement.querySelector('input[name=inviteId]').value
      const userId = acceptButton.parentElement.querySelector('input[name=userId]').value
      const url = `${SERVER}/api/user/${userId}/invites/${inviteId}`
      // TODO : Precisamos de verificar a resposta
      fetch(url, {
        method: "POST",
        headers: {
                     'Content-Type': 'application/json'
                     },

      })
      acceptButton.parent.parent.style.display=none
      
    })
  }

  const declineButtons = document.querySelectorAll('#decline')
  for (const declineButton of declineButtons) {
    declineButton.addEventListener('click',() => {
      const inviteId = declineButton.parentElement.querySelector('input[name=inviteId]').value
      const userId = declineButton.parentElement.querySelector('input[name=userId]').value
      const url = `${SERVER}/api/user/${userId}/invites/${inviteId}`
      // TODO : Precisamos de verificar a resposta
      fetch(url, {
        method: "DELETE",
        headers: {
                     'Content-Type': 'application/json'
                     },

      })
      declineButton.parent.parent.style.display=none
      
    })
  }
</script>
@endsection
