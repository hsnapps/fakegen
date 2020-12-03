<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" media="screen and (max-width: 600px)" href="{{ url('small.css') }}">
</head>
<body>
    <div class="paypal" style="position: absolute; top: 5px; right: 5px;">
        @include('components.paypal')
    </div>
    <div class="uk-container uk-container-large uk-padding">
        <div class="uk-text-center">
            <h1 class="uk-heading-medium">Fake Data Generator</h1>
        </div>
        @yield('content')
    </div>

    <script src="{{ mix('js/app.js') }}"></script>

    @include('shared.flashes')
    @stack('scripts')
</body>
</html>
