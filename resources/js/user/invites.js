import { sendRequest } from '../app.js'

const acceptButtons = document.querySelectorAll('#accept')
if (acceptButtons) {
  for (const acceptButton of acceptButtons) {
    acceptButton.addEventListener('click', () => {
      const inviteId = acceptButton.parentElement.querySelector(
        'input[name=inviteId]'
      ).value
      const userId =
        acceptButton.parentElement.querySelector('input[name=userId]').value
      const options = {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
      }
      // TODO : Precisamos de verificar a resposta
      sendRequest(`/api/user/${userId}/invites/${inviteId}`, options)
      acceptButton.parent.parent.style.display = none
    })
  }

  const declineButtons = document.querySelectorAll('#decline')
  for (const declineButton of declineButtons) {
    declineButton.addEventListener('click', () => {
      const inviteId = declineButton.parentElement.querySelector(
        'input[name=inviteId]'
      ).value
      const userId =
        declineButton.parentElement.querySelector('input[name=userId]').value
      // TODO : Precisamos de verificar a resposta
      const options = {
        method: 'DELETE',
        headers: { 'Content-Type': 'application/json' },
      }
      sendRequest(`/api/user/${userId}/invites/${inviteId}`, options)
      declineButton.parent.parent.style.display = none
    })
  }
}
