@extends('layouts.app')
<link href="{{ asset('/css/project.css') }}" rel="stylesheet">
@yield('content')
@section('content')
<section style="display:flex;flex-direction:column;justify-content:center">
<h2 class="page_name">Invites of {{$project->title}}</h2>
    <section class="invite-content" project-id="{{$project->id}}" user-id="{{Auth::user()->id}}"
        style="display:flex;gap:5em;margin:auto;">
    <section class="invite-list">
        <article class="project-invite-card">
            <p>Mariana enviou convite para Emanuel</p>
        </article>
        <article class="project-invite-card">
            <p>Leandro enviou convite para Martim</p>
        </article>
    </section>
    <section class="search-collaborator">
    <div class="search_bar">
      <i class="fa-solid fa-search"></i>
      <input class="search-user" type="text" placeholder="Search user...">
    </div>
    <section class="user-results" style="display:hidden"></section>
  </section>
</section>
</section>
<script src ="/public/js/globals.js"></script>
<script>
const searchUser = async (query,maxItems) =>{
    const params ={ query:query,maxItems:maxItems}
    const url = new URL(SERVER + "/api/search/users")
    url.search = new URLSearchParams(params).toString();
    const response = await fetch(url)
    const jsonResponse = await response.json()
    return jsonResponse
}
const apagarLista = () =>{
    lista = document.querySelector("section.user-results")
    lista.innerHTML=""
    lista.style.display= "hidden"
}

const preencherLista = (users) => {
    lista = document.querySelector("section.user-results")
    for (const user of users){
        const userItem = `
            <article class="user-card" user-id=${user.id} style="margin:0.5em;padding:1em;display:flex;border:1px solid blue;border-radius:1em;">
            <section class="user-card-name">
            <p>Name ${user.name}</p>
            <p>Username ${user.username}</p>
            </section>
            <section class="user-card-send-invite">
                <i class="fa-solid fa-envelope"></i>
            </section>            
            </article>
            `
        lista.innerHTML += userItem
    }    
    const userCards = document.querySelectorAll("article.user-card")
    for (const card of userCards) {
        const cardUserId = card.getAttribute('user-id')
        card.querySelector("section.user-card-name").addEventListener('click',() =>{
            window.location= (SERVER +"/user/"+cardUserId);
        })
        card.querySelector("section.user-card-send-invite").addEventListener('click',async() =>{
            const op = document.querySelector("section.invite-content")
            const projectId = op.getAttribute("project-id")
            const idInviter = op.getAttribute("user-id")
            const idInvitee = cardUserId
            const url = `${SERVER}/api/project/${projectId}/invites`
            const data = {id_invitee:idInvitee,id_inviter:idInviter}
            card.style.display="none"
            const response = await fetch(url,
                {
                     method:"POST",
                     headers: {
                     'Content-Type': 'application/json'
                     },
                    body:JSON.stringify(data)
                })
            })
        }
    lista.style.display= "block"
}

const queryInput= document.querySelector("input.search-user")
queryInput.addEventListener('input',async () =>{
    const maxItems = 10
    apagarLista()
    if (queryInput.value != "") {
    const result = await searchUser(queryInput.value,maxItems)
    preencherLista(result)
    
    }
})
</script>
@endsection
