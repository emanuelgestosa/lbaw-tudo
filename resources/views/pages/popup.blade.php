@extends('layouts.app')
@yield('content')
@section('content')
<h1>Creating PopUp</h1>
<label>Choose a Status:
    <select id="PopUp-status" name="popup-status">
        <option value="information">information</option>
        <option value="error">error</option>
        <option value="success">success</option>
    </select>
</label>
<label>Choose a Title
    <input type="text" name="popup-title" placeholder="PopUp Title" value="Pop Up Title">
</label>
<label>Choose the Text
    <input type="text" name="popup-text" placeholder="PopUp Text" value="Pop Up Text">
</label>
<button id="spawn-popup">Generate PopUp</button>
<style>
    article.tu-do-popup {
        position: fixed;
        display: flex;
        bottom: 0;
        right: 0;
        z-index: 10;
        flex-direction: column;
        width: 50em;
        padding: 1em;
        border: 1px solid blue;
        border-radius: 3em;
        color: white;
    }

    article.tu-do-popup * {
        position: relative;
    }

    article.tu-do-popup>header[information] {
        background-color: lightblue;
    }

    article.tu-do-popup>header[error] {
        background-color: red;
    }

    article.tu-do-popup>header[success] {
        background-color: green;

    }

    article.tu-do-popup[opening] {
        animation: slide-up 500ms ease-out, fade-in 700ms;
    }

    article.tu-do-popup[closing] {
        animation: slide-down 500ms ease-out, fade-out 700ms;
    }

    article.tu-do-popup.closed {
        display: none;
    }

    @keyframes slide-up {
        0% {
            transform: translateY(100%);
        }

        100% {
            transform: translateY(0%);
        }
    }

    @keyframes slide-down {
        0% {
            transform: translateY(0%);
        }

        100% {
            transform: translateY(100%);
        }
    }

    @keyframes fade-in {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    @keyframes fade-out {
        0% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }
</style>
<script>
    const createPopUp = (type, title, text) => {
    const popUp = document.createElement("article")
    popUp.classList.add("tu-do-popup")
    popUp.setAttribute("opening", "")
    const header = document.createElement("header")
    header.setAttribute(type, "")
    header.textContent = title
    const content = document.createElement("section")
    const p = document.createElement("p")
    p.textContent = text
    content.appendChild(p)
    popUp.appendChild(header)
    popUp.appendChild(content)
    console.log(popUp)
    const closePopUp = (popup) => {
        popUp.removeAttribute("opening")
        popUp.setAttribute("closing", "")
        popUp.addEventListener(
            "animationend",
            () => {
                popUp.removeAttribute("closing");
                popUp.classList.add("closed");
            }, {
                once: true
            })
    }
    popUp.addEventListener("animationend", () => {
        setTimeout(closePopUp,3*1000)
    })
    return popUp
    }
    const generatePopupButton = document.querySelector("button#spawn-popup")
    generatePopupButton.addEventListener("click", () => {
        const popUp = document.querySelector("article.tu-do-popup")
        if (popUp) {
            popUp.remove()
        }
        const inputTitle = document.querySelector("input[name='popup-title']")
        const title = inputTitle.value
        const inputText = document.querySelector("input[name='popup-text']")
        const text = inputText.value
        const inputType = document.querySelector("select#PopUp-status")
        const type = inputType.value
        console.log(type)
        document.body.appendChild(createPopUp(type, title, text))
    })
</script>
@endsection
