<div class="uk-grid-small uk-child-width-expand" uk-grid>
    <div class="uk-width-auto@m uk-width-auto@l uk-width-auto@xl uk-width-expand@s">
        <label class="uk-form-label" for="label">@lang('app.label')</label>
        <div class="uk-form-controls">
            <input class="uk-input" id="label" name="label" type="text" placeholder="@lang('app.label')" required autocomplete="off" autofocus>
        </div>
    </div>

    <div class="uk-width-auto@m uk-width-auto@l uk-width-auto@xl uk-width-expand@s">
        <label class="uk-form-label" for="category">@lang('app.category')</label>
        <div class="uk-form-controls">
            <select class="uk-select" id="category" name="category" onchange="fillSubCategories(event.target.value)"></select>
        </div>
    </div>

    <div>
        <label class="uk-form-label" for="sub-category">@lang('app.sub-category')</label>
        <div class="uk-form-controls">
            <select class="uk-select" id="sub-category" name="sub_category" onchange="renderProperties(event.target.value)"></select>
        </div>
    </div>
</div>

<div class="uk-grid-small uk-child-width-expand" uk-grid>
    @include('components.input', ['name' => 'size'])
    @include('components.input', ['name' => 'min'])
    @include('components.input', ['name' => 'max'])
    @include('components.input', ['name' => 'init'])

    <div id="type_div">
        <label class="uk-form-label" for="type">@lang('app.type')</label>
        <div class="uk-form-controls">
            <select class="uk-select" name="type" id="type"></select>
        </div>
    </div>
</div>

<blockquote class="uk-background-muted" cite="#" id="help"></blockquote>
