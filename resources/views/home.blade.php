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

        <div class="uk-grid-small uk-child-width-expand" uk-grid>
            <div>
                <label class="uk-form-label" for="label">Label</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="label" name="label" type="text" placeholder="Label" required>
                </div>
            </div>

            <div>
                <label class="uk-form-label" for="categories">Data Category</label>
                <div class="uk-form-controls">
                    <select class="uk-select" id="categories" name="categories" onchange="fillSubCategories(event.target.value)"></select>
                </div>
            </div>

            <div>
                <label class="uk-form-label" for="sub-categories">Sub Category</label>
                <div class="uk-form-controls">
                    <select class="uk-select" id="sub-categories" name="sub_categories" onchange="renderProperties(event.target.value)"></select>
                </div>
            </div>
        </div>

        <div class="uk-grid-small uk-child-width-expand" uk-grid>
            <div id="size_div">
                <label class="uk-form-label" for="size">Size</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="size" name="size" type="text" placeholder="Size">
                </div>
            </div>

            <div id="min_div">
                <label class="uk-form-label" for="min">Min</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="min" name="min" type="text" placeholder="Min">
                </div>
            </div>

            <div id="max_div">
                <label class="uk-form-label" for="max">Max</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="max" name="max" type="text" placeholder="Max">
                </div>
            </div>

            <div id="init_div">
                <label class="uk-form-label" for="init">Init.</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="init" name="init" type="text" placeholder="Init.">
                </div>
            </div>

            <div id="type_div">
                <label class="uk-form-label" for="type">Type / Gender</label>
                <div class="uk-form-controls">
                    <select class="uk-select" name="type" id="type"></select>
                </div>
            </div>
        </div>
    </div>

    <div class="uk-card-footer">
        @csrf
        <button type="submit" class="uk-button uk-button-default uk-align-right"><span uk-icon="icon: plus"></span> Add feild</button>
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
    const headers = {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
    };

    function fillCategories() {
        const url = '/api/categories';

        document.getElementById('categories').innerHTML = '';
        fetch(url, headers)
            .then(res => res.json())
            .then(data => {
                var html = '';
                for (const item in data) {
                    html += `<option value="${item}">${data[item]}</option>`;
                }
                document.getElementById('categories').innerHTML = html;

                if (document.getElementById('categories').childNodes.length > 0) {
                    fillSubCategories(document.getElementById('categories').childNodes[0].value);

                }
            })
            .catch(err => showError(err));
    }

    function fillSubCategories(category) {
        const url = '/api/types/' + category;
        fetch(url, headers)
            .then(res => res.json())
            .then(data => {
                document.getElementById('sub-categories').innerHTML = '';
                var html = '';
                for (const item in data) {
                    html += `<option value="${item}">${data[item]}</option>`;
                }
                document.getElementById('sub-categories').innerHTML = html;

                if (document.getElementById('sub-categories').childNodes.length > 0) {
                    renderProperties(document.getElementById('sub-categories').childNodes[0].value);
                }
            })
            .catch(err => showError(err));
    }

    function renderProperties(subcategory) {
        const category = document.getElementById('categories').value;
        const url = '/api/render/' + category + '/' + subcategory;

        document.getElementById('init').setAttribute('type', 'text');
        fetch(url, headers)
            .then(res => res.json())
            .then(data => {
                document.getElementById('type').innerHTML = '';

                for (const item in data) {
                    if(item === 'title') continue;

                    var show = data[item] === null ? 'none' : 'block';
                    document.getElementById(item + '_div').style.display = show;

                    if (item === 'type') {
                        if (Array.isArray(data[item])) {
                            var options = data[item];
                            var html = '';
                            for (const option in options) {
                                html += `<option value="${options[option]}">${options[option]}</option>`;
                            }
                            document.getElementById('type').innerHTML = html;
                        } else {
                            document.getElementById('type_div').style.display = 'none';
                            var val = data['type'];
                            switch (val) {
                                case 'date':
                                    document.getElementById('init').setAttribute('type', 'date');
                                    document.getElementById('min').setAttribute('type', 'date');
                                    document.getElementById('max').setAttribute('type', 'date');
                                    break;

                                default:
                                    break;
                            }

                            if(data['init']) {
                                document.getElementById('init').value = data['init'];
                            }
                        }
                    }
                }
            })
            .catch(err => showError(err));
    }

    function showError(err) {
        document.getElementById('err-message').innerText = err;
        document.getElementById('err-alert').style.display = 'block';
        // console.error(err);
    }

    fillCategories();
</script>
@endpush
