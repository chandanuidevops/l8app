<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .container{
            max-width: 960px;
            margin: auto;
        }
    </style>
</head>
<body>
    
<div class="container">
    <h2>@yield('title') </h2>
    @if (Session::has('message'))
        {{ Session::get('message') }}
    @endif
    @yield('content')
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
