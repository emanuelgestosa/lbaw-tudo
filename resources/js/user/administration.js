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
            window.location= (SERVER + "/user/"+userId);
        })
    }
    lista.style.display= "block"
}
const queryInput = document.querySelector("input.search-user")
const searchButton = document.querySelector("forum.search_bar>i")

queryInput.addEventListener('input',async () =>{
    const maxItems = 10
    apagarLista()
    if (queryInput.value != "") {
    const result = await searchUser(queryInput.value,maxItems)
    preencherLista(result)
    
    }
})
