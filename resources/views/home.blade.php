@extends('layouts.app')

@section('content')
<form class="uk-form-stacked uk-card uk-card-default uk-width-1-1" action="{{ route('add') }}" method="POST">
    <div class="uk-card-header">
        <h3><span uk-icon="icon: plus"></span> Add Feild</h3>
    </div>

    <div class="uk-card-body">
        @include('components.error')

        @include('components.download')

        @include('shared.validation')
        @include('components.form')
    </div>

    <div class="uk-card-footer">
        @csrf
        <button type="submit" class="uk-button uk-button-default uk-align-right"><span uk-icon="icon: plus"></span> Add feild</button>
    </div>
</form>

@if (isset($table))
    @include('components.table')
    @include('components.action_forms')
    @include('components.generate')
@endif

@endsection

@push('scripts')
<script src="{{ url('js/home.js') }}"></script>
@endpush
