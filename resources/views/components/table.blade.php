<div class="uk-form-horizontal uk-card uk-card-default uk-card-body uk-width-1-1 uk-margin-large-top">
    <div class="uk-overflow-auto">
        <table class="uk-table uk-table-hover uk-text-small@s uk-text-small@m">
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
                        <button type="button" class="uk-button uk-button-text uk-text-large@m uk-margin-large-right@m" uk-toggle="target: #modal-generate" ><span uk-icon="icon: cog"></span> Generate</button>
                        <button type="submit" class="uk-button uk-button-text uk-text-danger uk-text-large@m" onclick="removeAll()"><span uk-icon="icon: trash"></span> Remove all</button>
                    </td>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($table as $key => $value)
                    @if (!isset($value['label']))
                        @continue
                    @endif
                <tr id="{{ $key }}">
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $value['label'] }}</td>
                    <td>{{ sprintf('%s [%s]', __('categories.'.$value['category']), __('types.'.$value['category'].'.'.$value['sub_category'].'.title'))  }}</td>
                    <td>{{ $value['type'] }}</td>
                    <td>{{ $value['size'] }}</td>
                    <td>{{ $value['min'] }}</td>
                    <td>{{ $value['max'] }}</td>
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
</div>
