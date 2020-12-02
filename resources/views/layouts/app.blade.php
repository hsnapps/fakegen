<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div class="uk-container uk-container-large uk-padding">
        @yield('content')
    </div>

    <script src="{{ mix('js/app.js') }}"></script>

    @include('shared.flashes')
    @stack('scripts')
</body>
</html>
