const searchUser = async (query,maxItems) =>{
    const params ={ query:query,maxItems:maxItems}
    const url = new URL(window.SERVER + "/api/search/users")
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
            window.location= (window.SERVER +"/user/"+cardUserId);
        })
        card.querySelector("section.user-card-send-invite").addEventListener('click',async() =>{
            const op = document.querySelector("section.invite-content")
            const projectId = op.getAttribute("project-id")
            const idInviter = op.getAttribute("user-id")
            const idInvitee = cardUserId
            const url = `${window.SERVER}/api/project/${projectId}/invites`
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
            document.location.reload()
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
