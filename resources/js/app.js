window.SERVER = process.env.MIX_SENTRY_DSN_PUBLIC
export const sendRequest = async (url, options) => {
  const fullUrl = window.SERVER + url
  const response = await fetch(fullUrl, options)
  return response
}

// Pop Up
export const createPopUp = (type, title, text) => {
  const popUp = document.createElement('article')
  popUp.classList.add('tu-do-popup')
  popUp.setAttribute('opening', '')

  const header = document.createElement('header')
  header.setAttribute(type, '')
  const titleP = document.createElement('p')
  titleP.textContent = title
  header.appendChild(titleP)
  const closeButton = document.createElement('button')
  closeButton.textContent = 'X'
  header.appendChild(closeButton)

  const content = document.createElement('section')
  const headerSection = document.createElement('section')

  const p = document.createElement('p')
  p.textContent = text

  const closePopUp = (popup) => {
    popUp.removeAttribute('opening')
    popUp.setAttribute('closing', '')
    popUp.addEventListener(
      'animationend',
      () => {
        popUp.removeAttribute('closing')
        popUp.classList.add('closed')
      },
      {
        once: true,
      }
    )
  }
  closeButton.addEventListener('click', closePopUp)
  popUp.addEventListener('animationend', () => {
    setTimeout(closePopUp, 5 * 1000)
  })

  content.appendChild(p)
  popUp.appendChild(header)
  popUp.appendChild(content)

  return popUp
}
