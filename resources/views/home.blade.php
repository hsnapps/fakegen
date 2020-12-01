@extends('layouts.app')

@section('content')
<form class="uk-form-horizontal uk-card uk-card-default uk-width-1-1">
    <div class="uk-card-header">
        <h3><span uk-icon="icon: plus"></span> Add Feild</h3>
    </div>

    <div class="uk-card-body">
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Label</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" type="text" placeholder="Label">
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="categories">Data Category</label>
            <div class="uk-form-controls">
                <select class="uk-select" id="categories" onchange="fillSubCategories(event)">
                    @foreach (__('categories') as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="sub-categories">Sub Category</label>
            <div class="uk-form-controls">
                <select class="uk-select" id="sub-categories" onchange="renderProperties(event.target.value)">
                    @foreach (__('types.person') as $key => $value)
                    <option value="{{ $key }}">{{ $value['title'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="uk-card-footer">
        <button type="button" class="uk-button uk-button-default uk-align-right"><span uk-icon="icon: plus"></span> Add feild</button>
    </div>
</form>

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
            <tr>
                <td>Label</td>
                <td>Field Type</td>
                <td>Size</td>
                <td>Max</td>
                <td>Min</td>
                <td>
                    <ul class="uk-iconnav">
                        <li><a href="#" uk-icon="icon: chevron-up"></a></li>
                        <li><a href="#" uk-icon="icon: chevron-down"></a></li>
                        <li><a class="uk-text-danger" href="#" uk-icon="icon: trash"></a></li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    function fillSubCategories(e) {
        const url = '/api/types/' + e.target.value;
        fetch(url)
            .then(res => res.json())
            .then(data => {
                document.getElementById('sub-categories').innerHTML = '';
                var op = '';
                for (const item in data) {
                    op += `<option value="${item}">${data[item]}</option>`;
                }
                document.getElementById('sub-categories').innerHTML = op;
            })
            .catch(err => console.error(err));
    }

    function renderProperties(subcategory) {
        const category = document.getElementById('categories').value;
        const url = '/api/render/' + category + '/' + subcategory;
        fetch(url)
            .then(res => res.json())
            .then(data => {
                console.log(data);
            })
            .catch(err => console.error(err));
    }
</script>
@endpush
