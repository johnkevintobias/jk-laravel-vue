@extends('auth.layouts')

@section('content')
<!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
<div id="app">
    <example-counter></example-counter>
</div>
<script src="{{ asset('js/app.js') }}"></script>
    
@endsection