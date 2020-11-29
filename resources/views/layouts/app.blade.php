<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <livewire:styles />
</head>
<body>
    <div class="uk-container uk-container-expand">
        <livewire:navbar />
        @yield('content')
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <livewire:scripts />
</body>
</html>
