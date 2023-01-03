import { sendRequest } from '../app.js'

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
const preencherLista = (users) => {
  const lista = document.querySelector('section.user-results')
  for (const user of users) {
    const userItem = `
            <article class="user-card" user-id=${user.id}>
            <p>${user.name}</p>
            <p>${user.username}</p>
            </article>
            `
    lista.innerHTML += userItem
  }
  const userCards = document.querySelectorAll('article.user-card')
  for (const card of userCards) {
    card.addEventListener('click', () => {
      const userId = card.getAttribute('user-id')
      window.location = window.location.origin + '/user/' + userId
    })
  }
  lista.style.display = 'block'
}

export const addSearchUsersFunctionality = async () => {
  const queryInput = document.querySelector('input.search-user')
  if (queryInput) {
    queryInput.addEventListener('input', async () => {
      const maxItems = 10
      deleteUserResults()
      if (queryInput.value != '') {
        const result = await searchUsers(queryInput.value, maxItems)
        preencherLista(result)
      }
    })
  } else {
    console.log('Não Encontrei os Butoes ')
  }
}
