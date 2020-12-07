<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ __('app.dir') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="fakegen.online: free random fake data generator for any purposes." lang="en"/>
    <meta name="description" content="fakegen.online: مولد بيانات عشوائية مجاني" lang="ar"/>
	<meta name="keywords" content="Random Data, Test Data, Sample Data, data generator, generate data, fake data, fakephp, excel" />
    <title>{{ config('app.name') }}</title>
    {!! $css !!}
</head>
<body>
    <script data-name="BMC-Widget" src="https://cdnjs.buymeacoffee.com/1.0.0/widget.prod.min.js" data-id="hsnab" data-description="Support me on Buy me a coffee!" data-message="Thank you for visiting. You can now buy me a coffee!" data-color="#5F7FFF" data-position="Right" data-x_margin="18" data-y_margin="18"></script>
    <div class="uk-width-1-1" style="position: absolute; top: 0; right: 5px;">
        <div class="uk-float-right">
            @include('components.language')
        </div>
    </div>
    <div class="uk-container uk-container-large uk-padding">
        <div class="uk-text-center" style="direction: ltr !important">
            <a class="uk-logo" href="{{ route('home', ['lang' => app()->getLocale()]) }}"><img class="uk-inline" data-src="{{ url('images/favicon.png') }}" width="128" alt="" uk-img></a>
            <h1 class="uk-heading-medium uk-inline uk-margin-medium-bottom">@lang('app.title')</h1>
        </div>
        @yield('content')
    </div>

    @include('components.footer')

    {!! $js !!}
    @if (!env('APP_DEBUG'))
    <script type="text/javascript" charset="UTF-8" src="//cdn.cookie-script.com/s/fa45644ff513284c2ce79dcc7c6ef699.js"></script>
    @endif
    @include('shared.flashes')
</body>
</html>
