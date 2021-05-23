<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('resources/css/app.css')}}">
       
    </head>
    <body class="antialiased">
        
    @includeIf('partials.message')
        <h4>
            @if (Session::has('user_name'))
            {{Session::pull("user_name")}}
            {{Session::get("user_name")}}
            @else
            Guest
            @endif
            
        </h4>


 
    </body>
</html>
