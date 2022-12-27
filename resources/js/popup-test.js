import {createPopUp} from "./app.js";
const generatePopupButton = document.querySelector('button#spawn-popup')
generatePopupButton.addEventListener('click', () => {
  const popUp = document.querySelector('article.tu-do-popup')
  if (popUp) {
    popUp.remove()
  }
  const inputTitle = document.querySelector("input[name='popup-title']")
  const title = inputTitle.value
  const inputText = document.querySelector("input[name='popup-text']")
  const text = inputText.value
  const inputType = document.querySelector('select#PopUp-status')
  const type = inputType.value
  document.body.appendChild(createPopUp(type, title, text))
})

