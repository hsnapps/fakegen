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

        @include('shared.validation')
        @include('components.form')
    </div>

    <div class="uk-card-footer">
        @csrf
        <button type="submit" class="uk-button uk-button-default uk-align-right"><span uk-icon="icon: plus"></span> Add feild</button>
    </div>
</form>

@if (isset($table))
<div class="uk-form-horizontal uk-card uk-card-default uk-card-body uk-width-1-1 uk-margin-large-top">
    <table class="uk-table">
        <caption>Fields List</caption>
        <thead>
            <tr>
                <th>Label</th>
                <th>Field Type</th>
                <th class="uk-width-small">Size</th>
                <th class="uk-width-small">Min</th>
                <th class="uk-width-small">Max</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td>
                    <button type="button" class="uk-button uk-button-default"><span uk-icon="icon: cog"></span> Generate Data</button>
                </td>
                <td>
                    <button type="button" class="uk-button uk-button-default uk-text-danger"><span uk-icon="icon: trash"></span> Remove all feilds</button>
                </td>
                <td></td>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($table as $key => $value)
            <tr id="{{ $key }}">
                <td>{{ $value['label'] }}</td>
                <td>{{ $value['type'] }}</td>
                <td>{{ $value['size'] }}</td>
                <td>{{ $value['min'] }}</td>
                <td>{{ $value['max'] }}</td>
                <td>
                    <ul class="uk-iconnav">
                        <li><a href="#" uk-icon="icon: chevron-up"></a></li>
                        <li><a href="#" uk-icon="icon: chevron-down"></a></li>
                        <li><a class="uk-text-danger" href="#" uk-icon="icon: trash"></a></li>
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection

@push('scripts')
<script src="{{ url('js/home.js') }}"></script>
@endpush
