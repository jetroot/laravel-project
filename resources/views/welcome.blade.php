<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        @include('components.navbar')

        <div style="width: 100vw; height: 100vh; 
                    display: flex; flex-direction: column; 
                    justify-content: center; align-items: center; 
                    position: fixed; overflow: hidden">

            <h1 style="color: gray">Simple project</h1>
        </div>
    </body>
</html>
