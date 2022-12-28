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
    addComments(taskId)
  }
})
const toggleComments = () => {
  taskComponent.toggleAttribute('showing-comments')
  commentTab.toggleAttribute('closed')
}
toggleCommentsButton.addEventListener('click', toggleComments)

const getComments = async (taskId) => {
  const options = {
    method: 'GET',
  }
  const response = await sendRequest(`/api/task/${taskId}/comments`, options)
  const comments = await response.json()
  return comments
}

const addComments = async (taskId) => {
  const commentList = document.querySelector('section.comment-container')
  let comments = ''
  const commentData = await getComments(taskId)
  for (const comment of commentData) {
    comments += buildComment(comment)
  }
  commentList.innerHTML = ''
  commentList.innerHTML = comments
}

const buildComment = (comment) => {
  return `
    <article class="comment-component" id="${comment.id}">
        <p>Sent: ${comment.sent_date}</p>
        <p>${comment.msg}</p>
        <p>Sent By: ${comment.user.name}</p>
    </article>
    `
}
