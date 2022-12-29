import { sendRequest, createPopUp } from '../app.js'

const toggleCommentsButton = document.querySelector('#togle-comments')
const taskComponent = document.querySelector('article.task-component')
const commentTab = document.querySelector('section.comment-tab')
// WTF
commentTab.innerHTML += '<button id="more-comments">Load More Comments</button>'
const commentInput = document.querySelector('input#comment-input')
const taskId = commentInput.getAttribute('task-id')
const userId = commentInput.getAttribute('user-id')
commentInput.addEventListener('keypress', async (e) => {
  if (e.key == 'Enter') {
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
    await updateComments(taskId)
  }
})
const toggleComments = () => {
  taskComponent.toggleAttribute('showing-comments')
  commentTab.toggleAttribute('closed')
}

toggleCommentsButton.addEventListener('click', toggleComments)

const updateComments = async (taskId) => {
  const commentList = document.querySelector('div#message-list')
  let lastCommentId = "0"
  if (commentList.lastElementChild) {
    lastCommentId = commentList.lastElementChild.getAttribute('comment-id')
  }
  const options = {
    method: 'GET',
    params: {
      lastComment: lastCommentId,
    },
  }
  const response = await sendRequest(`/api/task/${taskId}/comments`, options)
  const commentData = await response.json()
  console.log(commentData)
  addComments(commentData.reverse())
}

const addComments = (comments) => {
  const commentList = document.querySelector('div#message-list')
  let commentsHTML= '' 
  for (const comment of comments) {
    commentsHTML += buildComment(comment)
  }
  commentList.innerHTML += commentsHTML
  commentList.scrollTop = commentList.scrollHeight
}

const initComments = async () => {
  loadOlderComments(taskId)
}
const buildComment = (comment) => {
  if (!(comment.id_users == userId)) {
    return buildMyComment(comment)
  } else {
    return buildOtherComment(comment)
  }
}

const buildOtherComment = (comment) => {
  return `
    <div class="message-item" comment-id="${comment.id}">
        <img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
        <div class="message-body">
            <p class="message-username">Here ${comment.user.name}</p>
            <div class="text-lists">
                <p class="message-text">${comment.msg}</p>
            </div>
            <p class="message-date">${comment.sent_date}| Aug 13</p>
        </div>
    </div>`
}
const buildMyComment = (comment) => {
  return `
    <div class="message-item" commet-id=${comment.id}">
        <div class="message-body user-message">
            <p class="message-username">${comment.user.name}</p>
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
  if (cursor === null) {
    const options = {
      method: 'GET',
    }
    const response = await sendRequest(`/api/task/${taskId}/comments`, options)
    const jsonResult = await response.json()
    commentInput.setAttribute('cursor', jsonResult.next_page_url)
    comments = jsonResult.data
  } else if (cursor === 'null') {
    console.log('No more Messages')
    return
  } else {
    console.log('Getting More Messages')
    const result = await fetch(cursor)
    const jsonResult = await result.json()
    commentInput.setAttribute('cursor', jsonResult.next_page_url)
    comments = jsonResult.data
  }

  console.log(comments)
  let olderComments = ''
  for (const comment of comments.reverse()) {
    olderComments += buildComment(comment)
  }
  const commentList = document.querySelector('div#message-list')
  commentList.innerHTML = olderComments + commentList.innerHTML
}

const loadMore = document.querySelector('button#more-comments')
loadMore.addEventListener('click', loadOlderComments)
initComments()
