@extends('layouts.app')

@section('content')
<form class="uk-form-stacked uk-card uk-card-default uk-width-1-1" action="{{ route('add') }}" method="POST">
    <div class="uk-card-header">
        <h3><span uk-icon="icon: plus"></span> Add Feild</h3>
    </div>

    <div class="uk-card-body">
        <div id="err-alert" class="uk-alert-danger" style="display: none" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p id="err-message"></p>
        </div>

        @if (session('file'))
        <div class="uk-alert-success" uk-alert>
            <p>{{ session('file') }}</p>
        </div>
        @endif

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
