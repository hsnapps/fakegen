<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ __('app.dir') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ url('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ __('app.dir') === 'rtl' ?  url('css/uikit-rtl.min.css') : url('css/uikit.min.css') }}">
    <link rel="stylesheet" media="screen and (max-width: 600px)" href="{{ url('css/small.css') }}">
</head>
<body>
    <div class="paypal" style="position: absolute; top: 5px; right: 5px;">
        @include('components.language')
    </div>
    <div class="uk-container uk-container-large uk-padding">
        <div class="uk-text-center" style="direction: ltr !important">
            <a class="uk-logo" href="{{ route('home', ['lang' => app()->getLocale()]) }}"><img class="uk-inline" data-src="{{ url('images/favicon.png') }}" width="128" alt="" uk-img></a>
            <h1 class="uk-heading-medium uk-inline uk-margin-medium-bottom">@lang('app.title')</h1>
        </div>
        @yield('content')
    </div>

    @include('components.footer')

    <script src="{{ url('js/uikit.min.js') }}"></script>
    <script src="{{ url('js/uikit-icons.min.js') }}"></script>
    @include('shared.flashes')
    <script src="{{ url('js/home.js') }}"></script>
</body>
</html>
