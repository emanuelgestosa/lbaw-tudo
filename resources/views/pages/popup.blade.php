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
<script src="/js/popup-test.js"></script>
@endsection
