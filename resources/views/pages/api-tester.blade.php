@extends('layouts.app')

@yield('content')

@section('content')

<h1>Testing an API</h1>
<form class="api-test" action="" onsubmit="return false">
<label>Query:<input type="text">>
<label>MaxItems:<input type="number">>
<button id="tests">Test</button>
</form>
<script>

const testApi = async () => {
    const queryInput = document.querySelector('input[type="text"]')
    const maxItemsInput = document.querySelector('input[type="number"]')

    let params ={ query:queryInput.value,maxItems:maxItemsInput.value}
    const url = new URL("http://127.0.0.1:8000/api/search/users")
    url.search = new URLSearchParams(params).toString();

    const response = await fetch(url)
    const jsonResponse = await response.json()

    console.log(response)
    console.log(jsonResponse)}

const testButton = document.querySelector("button#tests")
testButton.addEventListener('click',testApi)
</script>
@endsection
