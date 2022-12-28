import { sendRequest, createPopUp } from '../app.js'

const toggleCommentsButton = document.querySelector('#togle-comments')
const taskComponent = document.querySelector('article.task-component')
const commentTab = document.querySelector('section.comment-tab')
const commentInput = document.querySelector('input#comment-input')
const taskId = commentInput.getAttribute('task-id')
const userId = commentInput.getAttribute('user-id')
commentInput.addEventListener('keypress', async (e) => {
  if (e.key == 'Enter') {
    console.log(commentInput.value)
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
    await addComments(taskId)
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
  const commentList = document.querySelector('div#message-list')
  let comments = ''
  const commentData = await getComments(taskId)
  for (const comment of commentData) {
    comments += buildComment(comment)
  }
  commentList.innerHTML = ''
  commentList.innerHTML = comments
  commentList.scrollTop = commentList.scrollHeight
}

const buildComment = (comment) => {
  if (!(comment.id_users == userId)) {
    return buildMyComment(comment)
  } else {
    return buildOtherComment(comment)
  }
}
addComments(taskId)

const buildOtherComment = (comment) => {
  return `
    <div class="message-item">
        <img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
        <div class="message-body">
            <p class="message-username>${comment.user.name}</p>
            <div class="text-lists">
                <p class="message-text">${comment.msg}</p>
            </div>
            <p class="message-date">${comment.sent_date}| Aug 13</p>
        </div>
    </div>`
}
const buildMyComment = (comment) => {
  return `
    <div class="message-item">
        <div class="message-body user-message">
            <p class="message-username>${comment.user.name}</p>
            <div class="text-lists">
                <p class="message-text">${comment.msg}</p>
            </div>
            <p class="message-date">${comment.sent_date}| Aug 13</p>
        </div>
    </div>`
}
