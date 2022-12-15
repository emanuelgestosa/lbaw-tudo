@extends('layouts.app')

@yield('content')

@section('content')

<h1>Testing an API</h1>
<form class="api-test" action="" onsubmit="return false">
<label>Query:<input type="text">>
<label>MaxItems:<input type="number">>
<button id="tests" class="btn btn-primary">Test</button>
</form>

<script src ="/public/js/globals.js"></script>
<script>
const testApi = async () => {
    const queryInput = document.querySelector('input[type="text"]')
    const maxItemsInput = document.querySelector('input[type="number"]')
    const id = maxItemsInput.value
    //const url = new URL(`http://127.0.0.1:8000/api/user/${id}/invites`)
    //url.search = new URLSearchParams(params).toString();
    const url = `${SERVER}/api/project/3/invites`
    const data = {id_invitee:12,id_inviter:12}

    const response = await fetch(url,{
        method:"POST",
        headers: {
      'Content-Type': 'application/json'
        },
        body:JSON.stringify(data)
    })
    const jsonResponse = await response.text()

    console.log(response)
    console.log(jsonResponse)}

const testButton = document.querySelector("button#tests")
testButton.addEventListener('click',testApi)
</script>
@endsection
