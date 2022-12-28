import { sendRequest, createPopUp } from '../app.js'

const toggleCommentsButton = document.querySelector('#togle-comments')
const taskComponent = document.querySelector('article.task-component')
const commentTab = document.querySelector('section.comment-tab')
const commentInput = document.querySelector('input#comment-input')
commentInput.addEventListener('keypress', async (e) => {
  if (e.key == 'Enter') {
    console.log(commentInput.value)
    const userId = commentInput.getAttribute('user-id')
    const taskId = commentInput.getAttribute('task-id')
    const data = {
      msg: commentInput.value,
      id_users: parseInt(userId),
      sent_date: '2022-12-28',
    }
    commentInput.value = ''
    const options = {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(data),
    }
    const response = await sendRequest(`/api/task/${taskId}/comments`, options)
    console.log(await response.text())
  }
})
const toggleComments = () => {
  taskComponent.toggleAttribute('showing-comments')
  commentTab.toggleAttribute('closed')
}
toggleCommentsButton.addEventListener('click', toggleComments)
