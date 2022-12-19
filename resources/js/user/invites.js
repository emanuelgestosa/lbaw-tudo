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
