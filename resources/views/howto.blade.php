@extends('layouts.app')

@section('content')
<h1 class="uk-heading-divider">@lang('app.howto-title')</h1>
<ul class="uk-list uk-list-divider uk-list-decimal">
    @foreach (__('app.howto') as $image => $text)
        <li class="uk-margin-bottom">
            <h3 class="uk-heading-bullet">{{ $text }}</h3>
            <img class="uk-box-shadow-large" data-src="{{ url('images/'.$image) }}" width="1800" height="1200" alt="{{ $text }}" uk-img>
        </li>
    @endforeach
</ul>
@endsection
