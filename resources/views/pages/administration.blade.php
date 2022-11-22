@extends('layouts.app')

@yield('content')

@section('content')

  <h1 class="page_name">Administration Panel</h1>
  <section id="user-administration">
    <h2>User administration</h2>
    <a class="button" href="/admins/create"><i class="fa-solid fa-plus" style="font-size:150%;"></i> Create User</a>
    <div class="search_bar">
      <i class="fa-solid fa-search"></i>
      <input class="search-user" type="text" placeholder="Search user...">
    </div>
    <section class="user-results" style="display:hidden"></section>
  </section>

<script>

const searchUser = async (query,maxItems) =>{
    const params ={ query:query,maxItems:maxItems}
    const url = new URL("http://127.0.0.1:8000/api/search/users")
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
const preencherLista = (users) =>{
    lista = document.querySelector("section.user-results")
    for (const user of users){
        const userItem = `
            <article class="user-card" user-id=${user.id}>
            <p>${user.name}</p>
            <p>${user.username}</p>
            </article>
            `
        lista.innerHTML += userItem
    }    
    const userCards = document.querySelectorAll("article.user-card")
    for (const card of userCards){
        card.addEventListener('click',() =>{
            const userId = card.getAttribute('user-id')
            window.location= ("http://127.0.0.1:8000/user/"+userId);
        })
    }
    lista.style.display= "block"
}
const queryInput = document.querySelector("input.search-user")
const searchButton = document.querySelector("forum.search_bar>i")

queryInput.addEventListener('input',async () =>{
    const maxItems = 10
    const result = await searchUser(queryInput.value,maxItems)
    console.log(result)
    apagarLista()
    preencherLista(result)
})
</script>
@endsection
