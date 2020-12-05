@extends('layout')

@section('content')
<form class="uk-form-stacked uk-card uk-card-default uk-width-1-1" action="{{ route('add') }}" method="POST">
    <div class="uk-card-header">
        <h3><span uk-icon="icon: plus"></span> {{ __('app.add-feild') }}</h3>
    </div>

    <div class="uk-card-body">
        @include('components.error')

        @include('components.download')

        @include('shared.validation')
        @include('components.form')
    </div>

    <div class="uk-card-footer">
        @csrf
        <button type="submit" class="uk-button uk-button-default uk-align-{{ __('app.dir') === 'rtl' ?  'left' : 'right' }}"><span uk-icon="icon: plus"></span> {{ __('app.add-feild') }}</button>
    </div>
</form>

@if (isset($table))
    @include('components.table')
    @include('components.action_forms')
    @include('components.generate')
@endif

@endsection
