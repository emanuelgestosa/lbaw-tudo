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
const createUserResultCards = (users) => {
  let cards = ''
  for (const user of users) {
    const userCard = `
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
    cards += userCard
  }
  return cards
}
const userCardEventGoToProfile = (card) => {
  const cardUserId = card.getAttribute('user-id')
  card.querySelector('section.user-card-name').addEventListener('click', () => {
    window.location = window.SERVER + '/user/' + cardUserId
  })
}

const userCardSendInvite = (card) => {
  const cardUserId = card.getAttribute('user-id')
  card
    .querySelector('section.user-card-send-invite')
    .addEventListener('click', async () => {
      const op = document.querySelector('section.invite-content')
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
deleteInvitesAjax()
