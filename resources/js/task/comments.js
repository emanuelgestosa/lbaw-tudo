import { sendRequest, createPopUp } from '../app.js'

const toggleCommentsButton = document.querySelector('#togle-comments')
const taskComponent = document.querySelector('article.task-component')
const commentTab = document.querySelector('section.comment-tab')
// WTF
commentTab.innerHTML += '<button id="more-comments">Load More Comments</button>'
const commentInput = document.querySelector('input#comment-input')
const taskId = commentInput.getAttribute('task-id')
const userId = commentInput.getAttribute('user-id')
console.log(commentInput)
commentInput.addEventListener('keypress', async (e) => {
  if (e.key == 'Enter') {
    console.log(commentInput.value)
    const data = {
      msg: commentInput.value,
      id_users: parseInt(userId),
      sent_date: new Date(),
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
  if (commentInput.getAttribute('cursor') == undefined) {
    commentInput.setAttribute('cursor', comments.next_page_url)
  }
 console.log("Cursor Is Already Defined")
  return comments.data
}

const addComments = async (taskId) => {
  const commentList = document.querySelector('div#message-list')
  let comments = ''
  const commentData = await getComments(taskId)
  console.log(commentData)
  for (const comment of commentData) {
    comments += buildComment(comment)
  }
  commentList.innerHTML += comments
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

const loadOlderComments = async () => {
  const cursor = commentInput.getAttribute('cursor')
  let comments
  if (cursor) {
    const result = await fetch(cursor)
    const jsonResult = await result.json()
    commentInput.setAttribute('cursor', jsonResult.next_page_url)
    comments = jsonResult.data
  } else {
    comments = await getComments(taskId)
  }
  let olderComments = ''
  for (const comment of comments) {
    olderComments += buildComment(comment)
  }
  const commentList = document.querySelector('div#message-list')
  commentList.innerHTML = olderComments + commentList.innerHTML
}

const loadMore = document.querySelector('button#more-comments')
loadMore.addEventListener('click', loadOlderComments)
