<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>cafecity</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ mix('/css/main.css') }}">
    </head>
    <body>
        <div id="app">
            <app></app>
        </div>
    </body>
    <script src="{{ mix('/js/app.js') }}"></script>
</html>
