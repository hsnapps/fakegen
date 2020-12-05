<form action="{{ route('generate') }}" method="POST" class="uk-form-stacked" id="modal-generate" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">@lang('app.generate-data')</h2>
        </div>
        <div class="uk-modal-body">
            <div class="uk-margin">
                <label class="uk-form-label" for="number">@lang('app.number-of-rows')</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="number" name="number" type="number" placeholder="@lang('app.number-of-rows')" value="20">
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="locale">@lang('app.select-locale')</label>
                <div class="uk-form-controls">
                    <select class="uk-select" id="locale" name="locale">
                        @foreach (__('locales') as $locale => $localeName)
                        <option value="{{ $locale }}" {{ $locale === 'en_US' ? 'selected' : '' }}>{{ $localeName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-form-label">@lang('app.select-file-format')</div>
                <div class="uk-form-controls" uk-grid>
                    @foreach (__('formats') as $format => $formatName)
                    <div>
                        <label>
                            <input class="uk-radio" type="radio" name="format" value="{{ $format }}" {{ $formatName === 'XLSX' ? 'checked' : '' }}> {{ $formatName }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="uk-modal-footer uk-text-right">
            @csrf
            <button class="uk-button uk-button-default uk-modal-close" type="button">@lang('app.cancel')</button>
            <button class="uk-button uk-button-primary" type="submit">@lang('app.generate')</button>
        </div>
    </div>
</form>
