<div class="uk-form-horizontal uk-card uk-card-default uk-card-body uk-width-1-1 uk-margin-large-top">
    <div class="uk-overflow-auto">
        <table class="uk-table uk-table-hover uk-text-small@s uk-text-small@m">
            <caption>@lang('app.fields-list')</caption>
            <thead>
                <tr>
                    <th class="uk-table-shrink">#</th>
                    <th>{{ __('app.label') }}</th>
                    <th>{{ __('app.category') }}</th>
                    <th>{{ __('app.sub-category') }}</th>
                    <th class="uk-width-small">{{ __('app.size') }}</th>
                    <th class="uk-width-small">{{ __('app.min') }}</th>
                    <th class="uk-width-small">{{ __('app.max') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="3">
                        <button type="button" class="uk-button uk-button-text uk-text-large@m uk-margin-large-right@m" uk-toggle="target: #modal-generate" ><span uk-icon="icon: cog"></span> {{ __('app.generate') }}</button>
                        <button type="submit" class="uk-button uk-button-text uk-text-danger uk-text-large@m" onclick="removeAll()"><span uk-icon="icon: trash"></span> {{ __('app.remove-all') }}</button>
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
                    <td>{{ \Illuminate\Support\Arr::has($value, 'type') ? $value['type'] : '' }}</td>
                    <td>{{ $value['size'] }}</td>
                    <td>{{ $value['min'] }}</td>
                    <td>{{ $value['max'] }}</td>
                    <td>
                        <ul class="uk-iconnav">
                            <li><a href="#" uk-icon="icon: chevron-up" uk-tooltip="title: {{ __('app.move-up') }}" onclick="up('{{ $key }}', Number('{{ $value['index'] }}'))"></a></li>
                            <li><a href="#" uk-icon="icon: chevron-down" uk-tooltip="title: {{ __('app.move-down') }}" onclick="down('{{ $key }}', Number('{{ $value['index'] }}'), Number('{{ count($table) - 1 }}'))"></a></li>
                            <li><a class="uk-text-danger" href="#" uk-icon="icon: trash" uk-tooltip="title: {{ __('app.delete') }}" onclick="removeRow('{{ $key }}')"></a></li>
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
