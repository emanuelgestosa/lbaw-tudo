import { sendRequest, createPopUp } from '../app.js'

const toggleCommentsButton = document.querySelector("#togle-comments")
const  taskComponent= document.querySelector("article.task-component")
const commentTab = document.querySelector("section.comment-tab")
const commentInput = document.querySelector("input#comment-input")
commentInput.addEventListener("keypress",(e) =>{
    if(e.key == 'Enter'){
    console.log(commentInput.value)
    commentInput.value = ""
    }
})
const toggleComments = () =>{
    taskComponent.toggleAttribute("showing-comments")
    commentTab.toggleAttribute("closed")
}
toggleCommentsButton.addEventListener("click",toggleComments)
