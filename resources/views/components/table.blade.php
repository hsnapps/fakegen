<div class="uk-form-horizontal uk-card uk-card-default uk-card-body uk-width-1-1 uk-margin-large-top">
    <table class="uk-table uk-table-hover">
        <caption>Fields List</caption>
        <thead>
            <tr>
                <th class="uk-table-shrink">#</th>
                <th>Label</th>
                <th>Category</th>
                <th>Field Type</th>
                <th class="uk-width-small">Size</th>
                <th class="uk-width-small">Min</th>
                <th class="uk-width-small">Max</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="3">
                    <button type="button" class="uk-button uk-button-default" uk-toggle="target: #modal-generate" ><span uk-icon="icon: cog"></span> Generate Data</button>
                    <button type="submit" class="uk-button uk-button-default uk-text-danger" onclick="removeAll()"><span uk-icon="icon: trash"></span> Remove all feilds</button>
                </td>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($table as $key => $value)
            <tr id="{{ $key }}">
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ isset($value['label']) ? $value['label'] ? '' }}</td>
                @if (isset($value['category']) && isset($value['sub_category']))
                <td>{{ sprintf('%s [%s]', __('categories.'.$value['category']), __('types.'.$value['category'].'.'.$value['sub_category'].'.title'))  }}</td>
                @else
                <td></td>
                @endif
                <td>{{ isset($value['type']) ? $value['type'] : '' }}</td>
                <td>{{ isset($value['size']) ? $value['size'] : '' }}</td>
                <td>{{ isset($value['min']) ? $value['min'] : '' }}</td>
                <td>{{ isset($value['max']) ? $value['max'] : '' }}</td>
                <td>
                    <ul class="uk-iconnav">
                        <li><a href="#" uk-icon="icon: chevron-up" onclick="up('{{ $key }}', Number('{{ $value['index'] }}'))"></a></li>
                        <li><a href="#" uk-icon="icon: chevron-down" onclick="down('{{ $key }}', Number('{{ $value['index'] }}'), Number('{{ count($table) - 1 }}'))"></a></li>
                        <li><a class="uk-text-danger" href="#" uk-icon="icon: trash" onclick="removeRow('{{ $key }}')"></a></li>
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
