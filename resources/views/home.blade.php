<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'WSD') }}</title>
        <!-- Scripts -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="bg-blue">
        <div id="app">
            <form-data></form-data>
        </div>
    </body>
</html>
