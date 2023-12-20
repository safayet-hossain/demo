<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>123</title>
        @vite('resources/css/app.css')
    </head>
    <body>

        {{-- <div id="hello"></div> --}}
        <div id="practice"></div>

        @vite('resources/js/app.js')
    </body>
</html>

