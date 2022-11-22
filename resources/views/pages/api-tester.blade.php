@extends('layouts.app')

@yield('content')

@section('content')

<h1>Testing an API</h1>
<script>
const testApi = async () => {
    const url = new URL("http://127.0.0.1:8000/api/search/users")
    let params ={ query:"Mylén",maxItems:3}
    url.search = new URLSearchParams(params).toString();
    const response = await fetch(url)
    console.log(response)
    const jsonResponse = await response.json()
    console.log(jsonResponse)}
testApi()
</script>
@endsection
