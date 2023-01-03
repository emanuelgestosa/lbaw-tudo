import { sendRequest, createPopUp } from '../app.js'

const searchUsers = async (query, maxItems) => {
  const params = { query: query, maxItems: maxItems }
  const response = await sendRequest('/api/search/users', {
    method: 'GET',
    params: params,
  })
  const jsonResponse = await response.json()
  return jsonResponse
}

const deleteUserResults = () => {
  const lista = document.querySelector('section.user-results')
  lista.innerHTML = ''
  lista.style.display = 'hidden'
}

const handleInviteResponse = async (response) => {
  let popup
  const jsonResponse = await response.json()
  const message = jsonResponse.Message
  if (response.ok) {
    popup = createPopUp('success', 'Success', message)
  } else {
    popup = createPopUp('error', 'Error', message)
  }

  document.body.appendChild(popup)
}
const createUserResultCards= (users) => {
  let cards = ''
  for (const invite of invites) {
    const inviteCard =`
    <article class="user-card  col-12 col-md-6 col-lg-4" user-id="${user.id}">
        <div class="card shadow">
            <div class="card-body">
             <h5 class="card-title"><i class="fa fa-envelope" aria-hidden="true"></i> Invite to Tu-do</h5>
             <p class="card-text text-truncate" title="You were invited by Ricardo to the Tu-do project"></p>
            <section class="user-card-name">
            <p>Name ${user.name}</p>
            <p>Username ${user.username}</p>
            </section>
             <button class="btn btn primary" closed="">Send Invite</button>
             </div>
        </div>
    </article>`
    cards += inviteCard
  }
  return cards
}
const userCardEventGoToProfile = (card) => {
  const cardUserId = card.getAttribute('user-id')
  card.querySelector('section.user-card-name').addEventListener('click', () => {
    window.location = window.location.origin + '/user/' + cardUserId
  })
}

const userCardSendInvite = (card) => {
  const cardUserId = card.getAttribute('user-id')
  card
    .querySelector('button.btn')
    .addEventListener('click', async () => {
      const op = document.querySelector('meta[project-id]')
      const projectId = op.getAttribute('project-id')
      const idInviter = op.getAttribute('user-id')
      const idInvitee = cardUserId
      card.style.display = 'none'

      const url = `/api/project/${projectId}/invites`
      const data = { id_invitee: idInvitee, id_inviter: idInviter }
      const options = {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
      }
      const response = await sendRequest(url, options)
      handleInviteResponse(response)
    })
}

const addUserCardEvents = (card) => {
  userCardEventGoToProfile(card)
  userCardSendInvite(card)
}
const addEventListenerToUserCards = () => {
  const userCards = document.querySelectorAll('article.user-card')
  for (const card of userCards) {
    addUserCardEvents(card)
  }
}
const createUserResults = (users) => {
  const cards = createUserResultCards(users)
  const lista = document.querySelector('section.user-results')
  lista.innerHTML = cards
  addEventListenerToUserCards()
  lista.style.display = 'block'
}

const queryInput = document.querySelector('input.search-user')
if (queryInput) {
  queryInput.addEventListener('input', async () => {
    const maxItems = 10
    deleteUserResults()
    if (queryInput.value != '') {
      const users = await searchUsers(queryInput.value, maxItems)
      createUserResults(users)
    }
  })
}


const createInviteCards = (invites) => {
  let cards = ''
  for (const invite of invites) {
    const inviteCard =`
    <article class="project-invite-card col-12 col-md-6 col-lg-4" project-id="${invite.id_project}" invite-id="${invite.id}">
        <div class="card shadow">
            <div class="card-body">
             <h5 class="card-title"><i class="fa fa-envelope" aria-hidden="true"></i>  Invite to Tu-do</h5>
             <p class="card-text text-truncate" title="You were invited by Ricardo to the Tu-do project">
             From: <a href="/user/${invite.inviter.id}">${invite.inviter.name}</a> <br> To: <a href="/user/${invite.invitee.id}">${invite.invitee.name}</a>
             </p>
             <button class="btn btn primary" closed="">Delete Invite</button>
             </div>
        </div>
    </article>`
    cards += inviteCard
  }
  return cards
}

const getProjectInvites = async (id) =>{
  const response = await sendRequest(`/api/project/${id}/invites`, {
    method: 'GET',
  })
  const jsonResponse = await response.json()
  return jsonResponse
}

const bigChaq = async(id) =>{
    const projectId = document.querySelector("meta[project-id]").getAttribute("project-id")
    const invites = await getProjectInvites(projectId)
    const cards = createInviteCards(invites)
    const cardContainer = document.querySelector("div.container > div")
    cardContainer.innerHTML += cards
    await deleteInvitesAjax()
}
// Eliminar convites
const deleteInvitesAjax = async () => {
  const invites = document.querySelectorAll('article.project-invite-card')
  if (invites) {
    for (const invite of invites) {
      const deleteButton = invite.querySelector('button')
        const inviteId = invite.getAttribute("invite-id")
        const projId = invite.getAttribute("project-id")
        const data = { "inviteId": inviteId }
        const deleteInvite = async () => {
          const url = `/api/project/${projId}/invites/`
          const options = {
            method: 'DELETE',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
          }
          const response = await sendRequest(url, options)
          if(response.ok){
            invite.style.display = "none"
          }
          handleInviteResponse(response)
        }
        deleteButton.addEventListener('click', deleteInvite)
        invite.addEventListener('click', () => {
          deleteButton.toggleAttribute("closed")

        })
    }
  }
}
bigChaq()
